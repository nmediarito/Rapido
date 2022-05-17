<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function balanceView() {
        return view('customer.balance',[
            'balance' => User::with('balance')->findOrFail(auth()->user()->id),
            'payments' => Payment::where('user_id', auth()->user()->id)->whereIn('payment_status_id', [5, 6])->get(),
        ]);
    }

    public function jobInvoices() {
        return view('customer.jobinvoices',[
            'balance' => User::with('balance')->findOrFail(auth()->user()->id),
            'payments' => Payment::with('job', 'professional')->where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function deposit(Request $request) {
        $userBalance = User::with('balance')->findOrFail(auth()->user()->id);
        if($userBalance->balance == null) {
            return redirect()->route('balance.view')->with('error', 'You do not have an existing bank account entered to deposit money into.
            Please go to Add bank details page.');
        } else {

            $payment = new Payment();
            $payment->total = $request->input('total'); //Amount transaction
            $payment->payment_status_id = 5; //Deposit
            $payment->user_id = auth()->user()->id; //User
            $payment->payment_type_id = 1; //Credit
            $payment->save();

            $userBalance->balance->total = (int) $request->input('total') + $userBalance->balance->total;
            $userBalance->balance->save();
            return redirect()->route('balance.view')->with('message', 'Transaction successful.');
        }
    }

    public function withdraw(Request $request) {
        $userBalance = User::with('balance')->findOrFail(auth()->user()->id);
        if($userBalance->balance == null) {
            return redirect()->route('balance.view')->with('error', 'You do not have an existing bank account entered. Please go to Bank details page.');
            if($userBalance->balance->total === 0 || $request->input('total') > $userBalance->balance->total) {
                return redirect()->route('balance.view')->with('error', 'Transaction unsuccessful.');
            }
        } else {
            if($request->input('total') > $userBalance->balance->total){
                return redirect()->route('balance.view')->with('error', 'You cannot withdraw more than what you have in your account.');
            } else {

                $payment = new Payment();
                $payment->total = $request->input('total'); //Amount transaction
                $payment->payment_status_id = 6; //Withdrawal
                $payment->user_id = auth()->user()->id; //User
                $payment->payment_type_id = 2; //Debit
                $payment->save();

                $userBalance->balance->total = (int) $request->input('total') - $userBalance->balance->total;
                $userBalance->balance->save();
                return redirect()->route('balance.view')->with('message', 'Transaction successful.');
            }
        }
    }

    public function bankView() {
        return view('customer.bank',[
            'user' => User::with('balance')->findOrFail(auth()->user()->id),
        ]);
    }

    public function bankAdd(Request $request) {
        $userBalance = User::with('balance')->findOrFail(auth()->user()->id);
        if($userBalance->balance != null) {
            return redirect()->route('bank.view')->with('error', 'You already have an existing bank account details entered');
        } else {
            $bank = new Balance();
            $bank->user_id = auth()->user()->id;
            $bank->total = 0;
            $bank->account_number = $request->input('account_number');
            $bank->expiry_date = $request->input('expiry_date');
            $bank->cvv = $request->input('cvv');
            $bank->save();
            return redirect()->route('bank.view')->with('message', 'Bank details saved.');
        }
    }

    public function bankEdit(Request $request) {
        $userBalance = User::with('balance')->findOrFail(auth()->user()->id);
        $userBalance->balance->account_number = $request->input('account_number');
        $userBalance->balance->expiry_date = $request->input('expiry_date');
        $userBalance->balance->cvv = $request->input('cvv');
        $userBalance->balance->save();

        return redirect()->route('bank.view')->with('message', 'Bank details saved.');
    }
}
