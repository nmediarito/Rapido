@extends('layouts.dashboard')

@section('title')
    Job Invoices
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <div class="card text-center">
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#Transaction ID</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Mechanic ID</th>
                                    <th scope="col">Mechanic Name</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Payment Type</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <th scope="col">{{ $payment->id }}</th>
                                    <td scope="col">${{ $payment->total }}</td>
                                    <td scope="col">{{ (!is_null($payment->professional)) ? $payment->professional->id : 'Unassigned' }}</td>
                                    <td scope="col">{{ (!is_null($payment->professional)) ? $payment->professional->name : 'Unassigned' }}</td>
                                    <td scope="col">
                                        @if($payment->job)
                                            @if($payment->job->job_status_id == 1)
                                                <span class="badge bg-primary"> Pending </span>
                                            @elseif($payment->job->job_status_id == 2)
                                                <span class="badge bg-warning"> Processing </span>
                                            @elseif($payment->job->job_status_id == 3)
                                                <span class="badge bg-success"> Complete </span>
                                            @endif
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
        </div>
    </div>
@endsection
