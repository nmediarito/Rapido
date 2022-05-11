@extends('layouts.mainlayout')

@section('title')
    Customer Sign In
@endsection

@section('content')

    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Join Rapido today and drive with peace<p class="text-primary">EVERYWHERE</p></h1>
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="text-bold">Customer Registration - On Demand</h4>

                        @error('gender')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <form method="POST" action="/customer/register">

                            @csrf

                            <div class="form-group py-2">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>

                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                            @error('password_confirmation')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>

                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <select class="form-select py-2" aria-label="Default select example" id="gender" name="gender">
                                    <option selected>Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="N">N/A</option>
                                </select>
                            </div>

                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                            </div>

                            <div class="form-group py-2">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                            </div>

                            @error('dob')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <small class="form-text text-muted">We'll never share your email or password with anyone else.</small>
                            </div>

                            <div class="form-group py-2">
                                <small class="form-text text-muted">$10 Base Call-out charge - Total charge varies</small>
                            </div>

                            <button type="submit" class="btn btn-primary py-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/happywolf.png') }}" />
        </div>
    </div>
@endsection
