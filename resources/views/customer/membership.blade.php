@extends('layouts.dashboard')

@section('title')
    Register membership
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Sign up for a membership!</h1>
                <div class="card text-center">
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('membership.register.action') }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group py-2">
                                <select class="form-select py-2" aria-label="Default select example" id="membership_type_id" name="membership_type_id">
                                    <option value=1 {{ ($user->membership->membership_type_id === 1) ? 'selected' : '' }}>On Demand</option>
                                    <option value=2 {{ ($user->membership->membership_type_id === 2) ? 'selected' : ''  }}>Platinum</option>
                                </select>
                            </div>

                            @error('membership_type_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <button type="submit" class="btn btn-primary py-2">Register membership</button>
                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/happywolf.png') }}" />
        </div>
    </div>
@endsection
