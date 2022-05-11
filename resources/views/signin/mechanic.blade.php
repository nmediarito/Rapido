@extends('layouts.mainlayout')

@section('title')
    Mechanic Sign In
@endsection

@section('content')

    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Sign in and let’s make someone’s day<p class="text-primary">BETTER!</p></h1>
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="text-bold">Mechanic sign in to Rapido</h4>

                        <form method="POST" action="/customer/login">

                            @csrf

                            <div class="form-group py-2">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>

                            <div class="form-group py-2">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

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
