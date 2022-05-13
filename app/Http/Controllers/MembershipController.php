<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function registerMembershipView() {
        return view('customer.membership');
    }

    public function registerMembershipAction(Request $request) {

        if((auth()->user()->membership) == NULL) {
            $membership = new Membership();
            $membership->membership_type_id = $request->input('membership_type_id');
            $membership->user_id = auth()->user()->id;
            $membership->membership_number = Str::random(7);
            $membership->renewed_date = Carbon::now();
            $membership->save();

            return redirect()->route('membership.register.view')->with('message', 'Your new membership has now been registered');
        } else {
            return redirect()->route('membership.register.view')->with('error', 'You already have an existing membership active');
        }

    }
}
