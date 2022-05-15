@extends('layouts.mechanicdashboard')

@section('title')
    Customer ratings of your service quality
@endsection

@section('content')

<div class="container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto text-center">
            <h1 class="fw-light">Customer ratings of your service quality</h1>
            <div class="card text-center">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Rating (1 to 5)</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($ratings as $s)
                            <tr>
                                <td scope="row">{{ $s->name }}</td>
                                <td>{{ $s->email }}</td>
                                <td><span class="badge bg-warning">{{ $s->value }}</span></td>
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
