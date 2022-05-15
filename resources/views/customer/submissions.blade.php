@extends('layouts.dashboard')

@section('title')
    Submitted service requests
@endsection

@section('content')

<div class="container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto text-center">
            <h1 class="fw-light">Your submitted service requests</h1>
            <div class="card text-center">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#Job ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Failure Type</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $s)
                            <tr>
                                <th scope="row">{{ $s->id }}</th>
                                <td>
                                    @if($s->jobStatus->name == 'Pending')
                                        <span class="badge bg-secondary">{{ $s->jobStatus->name }}</span>
                                    @elseif($s->jobStatus->name == 'Accepted')
                                        <span class="badge bg-warning">{{ $s->jobStatus->name }}</span>
                                    @endif
                                </td>
                                <td>{{ $s->failureType->name }}</td>
                                <td>{{ $s->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <img class="w-50" src="{{ url('/images/wolffix.png') }}" />
    </div>
</div>

@endsection
