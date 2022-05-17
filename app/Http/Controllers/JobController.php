<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Payment;
use App\Models\Professional;
use Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function accept($id) {
        Jobs::where('id', $id)->update([
            'professional_id' => Auth::guard('professional')->user()->id,
            'job_status_id' => 2 //Accepted
        ]);

        Payment::where('job_id', $id)->update([
            'professional_id' => Auth::guard('professional')->user()->id
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

        $job = Jobs::where('id', $id)->first();

        //only charge user if the service request was made by an On Demand member
        if($job->payment_id > 0) {
            $userBalance = Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id);

            $payment = Payment::where('job_id', $id)->first();

            $userBalance->balance->total = $payment->total + $userBalance->balance->total;
            $userBalance->balance->save();
        }

        return view('mechanic.history', [
            'jobs' => Jobs::where('job_status_id', 3)->get(),
        ]);
    }

    public function cancel($id) {
        Jobs::where('id', $id)->update([
            'professional_id' => Auth::guard('professional')->user()->id,
            'job_status_id' => 1 //Pending
        ]);

        Payment::where('job_id', $id)->update([
            'professional_id' => NULL
        ]);

        return view('mechanic.accepted', [
            'jobs' => Jobs::where('job_status_id', 2)->get(),
        ]);
    }
}
