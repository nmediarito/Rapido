@extends('layouts.dashboard')

@section('title')
    Balance
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <div class="card text-center">
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <div class="py-5 container">
                            <h1 class="fw-light">Your total account balance: <p class="text-primary"> ${{ $balance->balance->total }} </p></h1>
                            <p class="lead text-muted">You may either deposit or withdraw below:</p>

                            <form method="POST" action="{{ route('balance.deposit') }}">

                                @csrf
                                @method('PUT')

                                <div class="form-group py-2">
                                    <input type="number" class="form-control" id="total" name="total" placeholder="100" required>
                                </div>

                                @error('total')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <button type="submit" class="btn btn-primary py-2">Deposit</button>

                            </form>

                            <form method="POST" action="{{ route('balance.withdraw') }}">

                                @csrf
                                @method('PUT')

                                <div class="form-group py-2">
                                    <input type="number" class="form-control" id="total" name="total" placeholder="100" required>
                                </div>

                                @error('total')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <button type="submit" class="btn btn-danger py-2">Withdraw</button>

                            </form>

                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#Transaction ID</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Payment Type</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <th scope="col">{{ $payment->id }}</th>
                                    <td scope="col">${{ $payment->total }}</td>
                                    <td scope="col">
                                        @if($payment->payment_status_id == 5)
                                            <span class="badge bg-primary"> Deposit </span>
                                        @elseif($payment->payment_status_id == 6)
                                            <span class="badge bg-secondary"> Withdrawal </span>
                                        @endif
                                    </td>
                                    <td scope="col"><span class="badge bg-{{ ($payment->payment_type_id == 1) ? 'success' : 'danger' }}"">{{ ($payment->payment_type_id == 1) ? 'Credit' : 'Debit' }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/happywolf.png') }}" />
        </div>
    </div>
@endsection
