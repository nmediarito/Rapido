<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Professional;
use Illuminate\Http\Request;
use Auth;

class MechanicBalanceController extends Controller
{
    public function balanceView() {
        return view('customer.balance',[
            'balance' => Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id),
            'payments' => Payment::where('user_id', Auth::guard('professional')->user()->id)->whereIn('payment_status_id', [5, 6])->get(),
        ]);
    }

    public function deposit(Request $request) {
        $userBalance = Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id);
        if($userBalance->balance == null) {
            return redirect()->route('balance.view.mechanic')->with('error', 'You do not have an existing bank account entered to deposit money into.
            Please go to Add bank details page.');
        } else {

            $payment = new Payment();
            $payment->total = $request->input('total'); //Amount transaction
            $payment->payment_status_id = 5; //Deposit
            $payment->user_id = Auth::guard('professional')->user()->id; //User
            $payment->payment_type_id = 1; //Credit
            $payment->save();

            $userBalance->balance->total = (int) $request->input('total') + $userBalance->balance->total;
            $userBalance->balance->save();
            return redirect()->route('balance.view.mechanic')->with('message', 'Transaction successful.');
        }
    }

    public function withdraw(Request $request) {
        $userBalance = Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id);
        if($userBalance->balance == null) {
            return redirect()->route('balance.view.mechanic')->with('error', 'You do not have an existing bank account entered. Please go to Bank details page.');
            if($userBalance->balance->total === 0 || $request->input('total') > $userBalance->balance->total) {
                return redirect()->route('balance.view.mechanic')->with('error', 'Transaction unsuccessful.');
            }
        } else {
            if($request->input('total') > $userBalance->balance->total){
                return redirect()->route('balance.view.mechanic')->with('error', 'You cannot withdraw more than what you have in your account.');
            } else {

                $payment = new Payment();
                $payment->total = $request->input('total'); //Amount transaction
                $payment->payment_status_id = 6; //Withdrawal
                $payment->user_id = Auth::guard('professional')->user()->id; //User
                $payment->payment_type_id = 2; //Debit
                $payment->save();

                $userBalance->balance->total = (int) $request->input('total') - $userBalance->balance->total;
                $userBalance->balance->save();
                return redirect()->route('balance.view.mechanic')->with('message', 'Transaction successful.');
            }
        }
    }

    public function bankView() {
        return view('mechanic.bank',[
            'user' => Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id),
        ]);
    }

    public function bankAdd(Request $request) {
        $userBalance = Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id);
        if($userBalance->balance != null) {
            return redirect()->route('bank.view.mechanic')->with('error', 'You already have an existing bank account details entered');
        } else {
            $bank = new Balance();
            $bank->user_id = Auth::guard('professional')->user()->id;
            $bank->total = 0;
            $bank->account_number = $request->input('account_number');
            $bank->expiry_date = $request->input('expiry_date');
            $bank->cvv = $request->input('cvv');
            $bank->save();
            return redirect()->route('bank.view.mechanic')->with('message', 'Bank details saved.');
        }
    }

    public function bankEdit(Request $request) {
        $userBalance = Professional::with('balance')->findOrFail(Auth::guard('professional')->user()->id);
        $userBalance->balance->account_number = $request->input('account_number');
        $userBalance->balance->expiry_date = $request->input('expiry_date');
        $userBalance->balance->cvv = $request->input('cvv');
        $userBalance->balance->save();

        return redirect()->route('bank.view.mechanic')->with('message', 'Bank details saved.');
    }
}
