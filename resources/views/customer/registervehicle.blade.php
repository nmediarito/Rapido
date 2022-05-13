@extends('layouts.dashboard')

@section('title')
    Register vehicle
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Register a vehicle</h1>
                <div class="card text-center">
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.register.action') }}">

                            @csrf

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="model" name="model" placeholder="Model" required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="transmission" name="transmission" placeholder="Transmission" required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="Plate number" required>
                            </div>

                            <button type="submit" class="btn btn-primary py-2">Submit vehicle</button>

                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/car.png') }}" />
        </div>
    </div>
@endsection
