@extends('layouts.mainlayout')

@section('title')
    Pricing
@endsection

@section('content')

<div class="container">
    <main>
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
                    <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
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
                    <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                </div>
            </div>
        </div>
      </div>

      <h2 class="display-6 text-center mb-4">Compare plans</h2>

      <div class="table-responsive">
        <table class="table text-center">
          <thead>
            <tr>
              <th style="width: 34%;"></th>
              <th style="width: 22%;">On Demand</th>
              <th style="width: 22%;">Platinum</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" class="text-start">All Services</th>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Priority 24/7 Support</th>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Battery Discounts</th>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Base Rate $10 (final pricing based on job)</th>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
              <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <th scope="row" class="text-start">Unlimited Call Outs</th>
                <td></td>
                <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
            <tr>
                <th scope="row" class="text-start">Priority 24/7 Support</th>
                <td></td>
                <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
            <tr>
                <th scope="row" class="text-start">No Extra Charges</th>
                <td></td>
                <td><svg class="bi" width="24" height="24"><use xlink:href="#check"/></svg></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>

  </div>

@endsection
