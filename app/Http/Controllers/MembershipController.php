<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function registerMembershipView() {
        return view('customer.membership', [
            'user' => User::with('membership')->findOrFail(auth()->user()->id)
        ]);
    }

    public function registerMembershipAction(Request $request) {

        $userMembership = Membership::where('user_id', auth()->user()->id)->first();

        //update membership
        $userMembership->membership_type_id = $request->input('membership_type_id');
        $userMembership->save();

        return redirect()->route('membership.register.view')->with('message', 'Your membership has been changed');

    }
}
