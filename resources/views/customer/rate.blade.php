@extends('layouts.dashboard')

@section('title')
    Rate mechanice
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Rate the mechanic</h1>
                <div class="card text-center">
                    <div class="card-body">

                        <div class="card text-center">
                            <div class="card-body">
                                <span class="fw-bold">Mechanic ID: </span> {{ $mechanic->id }} <br/>
                                <span class="fw-bold">Mechanic Name: </span> {{ $mechanic->name }} <br/>
                                <span class="fw-bold">Mechanic Qualification: </span> {{ $mechanic->qualification }} <br/>
                                <span class="fw-bold">Mechanic Motor Vehicle Repairer Licence: </span> {{ $mechanic->mvrl }} <br/>
                                <span class="fw-bold">Mechanic Email: </span> {{ $mechanic->email }} <br/>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('rate.action', $mechanic->id) }}">

                            @csrf

                            <div class="form-group py-2">
                                <input type="number" class="form-control" id="rating" name="rating" placeholder="Rating of 1 to 5" min="1" max="5" required>
                            </div>

                            @error('rating')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button type="submit" class="btn btn-primary py-2">Rate mechanic</button>
                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/happywolf.png') }}" />
        </div>
    </div>
@endsection
