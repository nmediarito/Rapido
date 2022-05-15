<?php

namespace App\Http\Controllers;

use App\Models\FailureType;
use App\Models\Jobs;
use App\Models\JobStatus;
use App\Models\User;
use App\Models\Professional;
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

        $serviceRequest = new Jobs();
        $serviceRequest->customer_id = auth()->id();
        $serviceRequest->job_status_id = JobStatus::findOrFail(1)->id; //Pending status
        $serviceRequest->professional_id = NULL;
        $serviceRequest->vehicle_id = $request->input('vehicle_id');
        $serviceRequest->payment_id = NULL;
        $serviceRequest->failure_type_id = $request->input('failure_type_id');
        $serviceRequest->description = $request->input('description');
        $serviceRequest->long = NULL;
        $serviceRequest->lat = NULL;
        $serviceRequest->save();

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
            ->where('job_status_id', [1, 2])
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
