@extends('layouts.dashboard')

@section('title')
    Your registered vehicles
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Your registered vehicles</h1>
                <div class="card text-center">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Model</th>
                                <th scope="col">Transmission</th>
                                <th scope="col">Plate number</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr>
                                    <td scope="row">{{ $vehicle->name }}</td>
                                    <td scope="row">{{ $vehicle->brand }}</td>
                                    <td scope="row">{{ $vehicle->model }}</td>
                                    <td scope="row">{{ $vehicle->transmission }}</td>
                                    <td scope="row">{{ $vehicle->plate_number }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/car.png') }}" />
        </div>
    </div>
@endsection
