<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function customerRegister(Request $request) {
        //validate few of the fields
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
        ]);

        //create new user
        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = Hash::make($request->input('password'));
        $newUser->gender = $request->input('gender');
        $newUser->phone = $request->input('phone');
        $newUser->dob = $request->input('dob');
        $newUser->save();

        //sign user in
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('customer.home');

    }

    public function customerLogin(Request $request) {

        //validate few of the fields
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //sign user in
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('customer.home');

    }

    public function mechanicLogin() {

    }

    public function edit(Request $request) {

        //validate few of the fields
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
        ]);

        $user = auth()->user();

        $user->update([
            'name'=> $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'dob' => $request->input('dob')
        ]);

        return redirect()->route('customer.profile.view');

    }
}
