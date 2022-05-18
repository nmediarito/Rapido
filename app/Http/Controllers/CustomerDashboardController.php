<?php

namespace App\Http\Controllers;

use App\Models\FailureType;
use App\Models\Jobs;
use App\Models\JobStatus;
use App\Models\User;
use App\Models\Professional;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Auth;

class CustomerDashboardController extends Controller
{
    public function home() {
        return view('customer.home');
    }

    public function requestView() {

        return view('customer.submit',[
            'failureTypes' => FailureType::get(),
            'vehicles' => Vehicle::where('user_id', auth()->user()->id)->get(),
        ]);

    }

    public function requestAction(Request $request) {

        $user = User::with('balance', 'membership')->findOrFail(auth()->user()->id);

        //if user is On Demand membership
        if($user->membership->membership_type_id == 1) {
            //validate that user has credit in his account balance to request a service (minimum $10 for a call out fee)
            if($user->balance->total >= 10) {
                $serviceRequest = new Jobs();
                $serviceRequest->customer_id = $user->id;
                $serviceRequest->job_status_id = JobStatus::findOrFail(1)->id; //Pending status
                $serviceRequest->professional_id = NULL;
                $serviceRequest->vehicle_id = $request->input('vehicle_id');
                $serviceRequest->payment_id = 0;
                $serviceRequest->failure_type_id = $request->input('failure_type_id');
                $serviceRequest->description = $request->input('description');
                $serviceRequest->long = NULL;
                $serviceRequest->lat = NULL;
                $serviceRequest->save();

                //save payment related to the job
                $payment = new Payment();
                $payment->total = 10; //Amount transaction
                $payment->payment_status_id = 1; //Pending until the job is completed
                $payment->user_id = auth()->user()->id; //User
                $payment->job_id = $serviceRequest->id; //Assign the job to the invoice
                $payment->payment_type_id = 2; //Debit
                $payment->save();

                //deduct the call out fee charge off the user's balance
                $user->balance->total = $user->balance->total - 10;
                $user->balance->save();

                $serviceRequest->update([
                    'payment_id' => $payment->id
                ]);


                return redirect()->route('customer.request.view')->with('message', 'Service request successful.');
            } else {
                return redirect()->route('customer.request.view')->with('error', 'You do not have enough balance in your account to request a service as you are on \'On Demand\' membership. Please add a minimum of $10.');
            }
        } else { //Customer is on a Platinum membership
                //no charge
                $serviceRequest = new Jobs();
                $serviceRequest->customer_id = $user->id;
                $serviceRequest->job_status_id = JobStatus::findOrFail(1)->id; //Pending status
                $serviceRequest->professional_id = NULL;
                $serviceRequest->vehicle_id = $request->input('vehicle_id');
                $serviceRequest->payment_id = 0;
                $serviceRequest->failure_type_id = $request->input('failure_type_id');
                $serviceRequest->description = $request->input('description');
                $serviceRequest->long = NULL;
                $serviceRequest->lat = NULL;
                $serviceRequest->save();

                //save payment related to the job
                $payment = new Payment();
                $payment->total = 0; //Amount transaction
                $payment->payment_status_id = 1; //Pending until the job is completed
                $payment->user_id = auth()->user()->id; //User
                $payment->job_id = $serviceRequest->id; //Assign the job to the invoice
                $payment->payment_type_id = 2; //Debit
                $payment->save();

                $serviceRequest->update([
                    'payment_id' => $payment->id
                ]);

                return redirect()->route('customer.request.view')->with('message', 'Service request successful.');
        }

        return view('customer.submit',[
            'failureTypes' => FailureType::get(),
            'vehicles' => Vehicle::where('user_id', auth()->user()->id)->get(),
        ]);

    }

    public function calloutHistory() {

        //get the logged in user
        $user = auth()->user()->id;

        $jobs = Jobs::with('jobStatus', 'failureType')
            ->where('customer_id', $user)
            ->where('job_status_id', 3) //Completed jobs
            ->get();

        return view('customer.history',[
            'jobs' => $jobs
        ]);

    }

    public function submissions() {

        //get the logged in user
        $user = auth()->user()->id;

        $jobs = Jobs::with('jobStatus', 'failureType')
            ->where('customer_id', $user)
            ->whereIn('job_status_id', [1, 2])
            ->get();

        return view('customer.submissions',[
            'submissions' => $jobs
        ]);

    }

    public function profileView() {
        return view('customer.edit',[
            'user' => User::with('membership')->findOrFail(auth()->user()->id),
        ]);
    }

    public function rateView($mechanicId) {
        return view('customer.rate',[
            'mechanic' => Professional::findOrFail($mechanicId)
        ]);
    }

    public function rateAction($mechanicId, Request $request) {
        //user rate the mechanic who did the service
        auth()->user()->rate(Professional::findOrFail($mechanicId), $request->input('rating'));

        return redirect()->route('customer.history');
    }
}
