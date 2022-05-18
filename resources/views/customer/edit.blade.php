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
                                <input type="text" disabled class="form-control" id="membership" name="membership" value='Membership Number: {{ (isset($user->membership->membership_number)) ? $user->membership->membership_number : 'N/A' }}'' required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" disabled class="form-control" id="membership_type_id" name="membership_type_id" value='Membership Type: {!! (isset($user->membership->membership_type_id) && $user->membership->membership_type_id == 1) ? 'On Demand' : '' !!}{!! (isset($user->membership->membership_type_id) && $user->membership->membership_type_id == 2) ? 'Platinum' : '' !!}' required>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value={{ auth()->user()->name }} required>
                            </div>

                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <select class="form-select py-2" aria-label="Default select example" id="gender" name="gender" required>
                                    <option value="M" {{ (auth()->user()->gender == 'M') ? 'selected' : '' }}>Male</option>
                                    <option value="F" {{ (auth()->user()->gender == 'F') ? 'selected' : '' }}>Female</option>
                                    <option value="N" {{ (auth()->user()->gender == 'N') ? 'selected' : '' }}>N/A</option>
                                </select>
                            </div>

                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value={{ auth()->user()->phone }} required>
                            </div>

                            <div class="form-group py-2">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value={{ auth()->user()->dob }} required>
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
