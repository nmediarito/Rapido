<?php

namespace App\Http\Controllers;

use App\Models\FailureType;
use App\Models\Jobs;
use App\Models\JobStatus;
use Illuminate\Http\Request;
use App\Models\Vehicle;

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

    public function submissions() {

        //get the logged in user
        $user = $user = auth()->user()->id;

        $jobs = Jobs::with('jobStatus', 'failureType')
            ->where('customer_id', $user)
            ->get();

        return view('customer.submissions',[
            'submissions' => $jobs
        ]);
    }

    public function profileView() {
        return view('customer.edit');
    }
}
