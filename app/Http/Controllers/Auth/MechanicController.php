<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Professional;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function loginView() {
        return view('signin.mechanic');
    }

    public function loginAction(Request $request) {

        Session::flush();

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::guard('professional')->attempt($credentials)) {
            return redirect()->route('mechanic.home');
        } else {
            return back()->withErrors([
                'message' => 'The provided credentials do not match our records.',
            ]);
        }

    }

    public function registerview() {
        return view('registration.mechanic');
    }

    public function registerAction(Request $request) {
        //validate few of the fields
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3',
            'gender' => 'required',
        ]);

        //create new mechanic/professional
        $newProfessional = new Professional();
        $newProfessional->name = $request->input('name');
        $newProfessional->email = $request->input('email');
        $newProfessional->password = Hash::make($request->input('password'));
        $newProfessional->employment_type = $request->input('employment_type');
        $newProfessional->mvrl = $request->input('mvrl');
        $newProfessional->phone = $request->input('phone');
        $newProfessional->qualification = $request->input('qualification');
        $newProfessional->dob = $request->input('dob');
        $newProfessional->save();

        $bank = new Balance();
        $bank->user_id = $newProfessional->id;
        $bank->total = 0;
        $bank->account_number = $request->input('account_number');
        $bank->expiry_date = $request->input('expiry_date');
        $bank->cvv = $request->input('cvv');
        $bank->save();

        //sign user in
        auth()->guard('professional')->attempt($request->only('email', 'password'));

        return redirect()->route('mechanic.home');

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

        Professional::where('id', Auth::guard('professional')->user()->id)->update([
            'name'=> $request->input('name'),
            'email' => $request->input('email'),
            'mvrl' => $request->input('mvrl'),
            'qualification' => $request->input('qualification'),
            'employment_type' => $request->input('employment_type'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'dob' => $request->input('dob')
        ]);

        return redirect()->route('mechanic.profile.view');

    }

}
