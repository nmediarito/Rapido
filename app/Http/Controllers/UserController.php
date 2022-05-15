<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginView() {
        return view('signin.customer');
    }

    public function loginAction(Request $request) {

        Session::flush();

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('customer.home');
        } else {
            return back()->withErrors([
                'message' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function registerview() {
        return view('registration.customer');
    }

    public function registerAction(Request $request) {
        //validate few of the fields
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3',
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

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }

    public function edit(Request $request) {

        //validate few of the fields
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
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
