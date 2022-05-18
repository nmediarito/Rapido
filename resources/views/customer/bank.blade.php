@extends('layouts.dashboard')

@section('title')
    Add bank details
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">

                @if(isset($user->balance))
                <h1 class="fw-light">Your current bank details</h1>
                <div class="card text-center">
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('bank.edit') }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" value={{ $user->balance->account_number }} required>
                            </div>

                            <div class="form-group py-2">
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Expiry Date" value={{ $user->balance->expiry_date }}  required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" value={{ $user->balance->cvv }} required>
                            </div>

                            <button type="submit" class="btn btn-primary py-2">Edit bank details</button>

                        </form>
                    </div>
                </div>

                @else
                <h1 class="fw-light">Add bank account details to start transactions</h1>
                <div class="card text-center">
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('bank.add') }}">

                            @csrf

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" required>
                            </div>

                            <div class="form-group py-2">
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Expiry Date" required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
                            </div>

                            <button type="submit" class="btn btn-primary py-2">Submit</button>

                        </form>
                    </div>
                </div>
                @endif


            </div>

            <img class="w-50" src="{{ url('/images/happywolf.png') }}" />
        </div>
    </div>
@endsection
