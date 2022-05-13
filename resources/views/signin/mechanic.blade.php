@extends('layouts.mainlayout')

@section('title')
    Mechanic Sign In
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Sign in and let's make someone's day <span class="text-primary">BETTER</span>!</h1>
                <div class="card text-center">
                    <div class="card-body py-2">

                        @if($errors->first('message'))
                            <div class="bg-danger text-white py-2">
                                {{ $errors->first('message') }}
                            </div>
                        @endif

                        <h4 class="text-bold py-2">Mechanic sign in to Rapido</h4>

                        <form method="POST" action="{{ route('mechanic.login.action') }}">

                            @csrf

                            <div class="form-group py-2">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>

                            @if($errors->first('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                            <div class="form-group py-2">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            @if($errors->first('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif

                            <div class="form-group py-2">
                                <a href="/forgotpassword">Forgot password?</a>
                            </div>

                            <div class="form-group py-2">
                                <small class="form-text text-muted">We'll never share your email or password with anyone else.</small>
                            </div>

                            <button type="submit" class="btn btn-primary py-2">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/wolffix.png') }}" />
        </div>
    </div>
@endsection
