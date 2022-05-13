<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function accept($id) {
        Jobs::where('id', $id)->update([
            'professional_id' => Auth::guard('professional')->user()->id,
            'job_status_id' => 2 //Accepted
        ]);

        return view('mechanic.availablejobs', [
            'jobs' => Jobs::where('job_status_id', 1)->get(),
        ]);
    }

    public function complete($id) {
        Jobs::where('id', $id)->update([
            'professional_id' => Auth::guard('professional')->user()->id,
            'job_status_id' => 3 //Completed
        ]);

        return view('mechanic.history', [
            'jobs' => Jobs::where('job_status_id', 3)->get(),
        ]);
    }

    public function cancel($id) {
        Jobs::where('id', $id)->update([
            'professional_id' => Auth::guard('professional')->user()->id,
            'job_status_id' => 1 //Pending
        ]);

        return view('mechanic.accepted', [
            'jobs' => Jobs::where('job_status_id', 2)->get(),
        ]);
    }
}
