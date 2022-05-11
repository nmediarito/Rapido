@extends('layouts.dashboard')

@section('title')
    Edit profile
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Edit profile</h1>
                <div class="card text-center">
                    <div class="card-body">

                        <form method="POST" action="{{ route('customer.profile.action') }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group py-2">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value={{ auth()->user()->email }}>
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
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value={{ auth()->user()->name }}>
                            </div>

                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <select class="form-select py-2" aria-label="Default select example" id="gender" name="gender" value={{ auth()->user()->gender }}>
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
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value={{ auth()->user()->phone }}>
                            </div>

                            <div class="form-group py-2">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value={{ auth()->user()->dob }}>
                            </div>

                            @error('dob')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button type="submit" class="btn btn-primary py-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/happywolf.png') }}" />
        </div>
    </div>
@endsection
