@extends('layouts.mainlayout')

@section('title')
    Rapido
@endsection

@section('content')

    <div class="py-5 container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Ride with peace, we’ve got you <p class="text-primary">COVERED!</p></h1>
                <p class="lead text-muted">Australia’s leading road side assistance provided, with flexible models based on your needs</p>
                <p>
                <a href="{{ route('customer.registration.view') }}" class="btn btn-primary my-2">Get started</a>
                <a href="{{ route('mechanic.registration.view') }}" class="btn btn-primary my-2">Mechanic Registration</a>
                </p>
            </div>
        </div>
    </div>

    <div class="text-center container">
        <div class="card">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 text-center">
                    <div class="col">
                        <div class="fs-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path>
                            </svg>
                            10,000+
                        </div>
                        <p class="lead text-muted">Customers</p>
                    </div>
                    <div class="col">
                        <div class="fs-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                            </svg>
                            All Aussie States
                        </div>
                        <p class="lead text-muted">24/7</p>
                    </div>
                    <div class="col">
                        <div class="fs-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hdd-rack" viewBox="0 0 16 16">
                                <path d="M4.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM3 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm2 7a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2.5.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                <path d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1v2H2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2h-1V7h1a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm0 7v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-3-4v2H4V7h8z"/>
                            </svg>
                            6+
                        </div>
                        <p class="lead text-muted">Services</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 text-center container">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

            <img class="w-25" src="{{ url('/images/pricingwolf.png') }}" />

            <div class="col">
                <div class="card rounded-3 shadow-sm">
                    <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">On Demand</h4>
                    </div>
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title">$10+<small class="text-muted fw-light">/job</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>All Services</li>
                        <li>Priority 24/7 Support</li>
                        <li>Battery Discounts</li>
                        <li>Base Rate $10 (final pricing based on job)</li>
                    </ul>
                    <a href="{{ route('customer.registration.view') }}" class="btn btn-primary w-100">Go On Demand</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-white bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Platinum</h4>
                    </div>
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title">$149<small class="text-muted fw-light">/year</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Unlimited Call Outs</li>
                        <li>Priority 24/7 Support</li>
                        <li>Battery Discounts</li>
                        <li>No Extra Charges</li>
                    </ul>
                    <a href="{{ route('customer.registration.view') }}" class="btn btn-primary w-100">Go On Platinum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
