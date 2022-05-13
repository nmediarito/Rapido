@extends('layouts.mechanicdashboard')

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

                        <form method="POST" action="{{ route('mechanic.profile.action') }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group py-2">
                                <input type="text" disabled class="form-control" id="membership" name="membership" value='Membership Number: {{ (isset($user->membership->membership_number)) ? $user->membership->membership_number : 'N/A' }}''>
                            </div>

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value={{ Auth::guard('professional')->user()->name }}>
                            </div>

                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="mvrl" name="mvrl" value={{ Auth::guard('professional')->user()->mvrl }} placeholder="Motor Vehicle Repairer Licence (7 characters)">
                            </div>

                            @error('mvrl')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="qualification" value={{ Auth::guard('professional')->user()->qualification }} name="qualification" placeholder="Highest Qualficiation e.g. Bachelors, Masters, Diploma">
                            </div>

                            @error('qualification')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <select class="form-select py-2" aria-label="Default select example" id="gender" name="gender">
                                    <option value="M" {{ (Auth::guard('professional')->user()->gender == 'M') ? 'selected' : '' }}>Male</option>
                                    <option value="F" {{ (Auth::guard('professional')->user()->gender == 'F') ? 'selected' : '' }}>Female</option>
                                    <option value="N" {{ (Auth::guard('professional')->user()->gender == 'N') ? 'selected' : '' }}>N/A</option>
                                </select>
                            </div>

                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <select class="form-select py-2" aria-label="Default select example" id="employment_type" name="employment_type">
                                    <option value="CL" {{ (Auth::guard('professional')->user()->employment_type == 'CL') ? 'selected' : '' }}>Casual</option>
                                    <option value="FT" {{ (Auth::guard('professional')->user()->employment_type == 'FT') ? 'selected' : '' }}>Full-time</option>
                                    <option value="PT" {{ (Auth::guard('professional')->user()->employment_type == 'PT') ? 'selected' : '' }}>Part-time</option>
                                    <option value="NA" {{ (Auth::guard('professional')->user()->employment_type == 'NA') ? 'selected' : '' }}>N/A</option>
                                </select>
                            </div>

                            @error('employment_type')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group py-2">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value={{ Auth::guard('professional')->user()->phone }}>
                            </div>

                            <div class="form-group py-2">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value={{ Auth::guard('professional')->user()->dob }}>
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
