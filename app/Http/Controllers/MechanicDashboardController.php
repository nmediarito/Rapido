<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Auth;
use DB;
use Illuminate\Http\Request;

class MechanicDashboardController extends Controller
{
    public function home() {
        return view('mechanic.home');
    }

    public function history() {
        $professionalId = Auth::guard('professional')->user()->id;
        return view('mechanic.history', [
            'jobs' => Jobs::where('job_status_id', 3)->where('professional_id', $professionalId)->get(),
        ]);
    }

    public function availableJobs() {
        return view('mechanic.availablejobs', [
            'jobs' => Jobs::where('job_status_id', 1)->get(),
        ]);
    }

    public function acceptedJobs() {
        return view('mechanic.accepted', [
            'jobs' => Jobs::where('job_status_id', 2)->get(),
        ]);
    }

    public function profileView() {
        return view('mechanic.edit');
    }

    public function ratingsView() {
          return view('mechanic.ratings', [
            'ratings' => DB::table('ratings')
                ->select('*')
                ->join('users', 'ratings.model_id', '=', 'users.id')
                ->where('rateable_id', Auth::guard('professional')->user()->id)->get(),
        ]);
    }
}
