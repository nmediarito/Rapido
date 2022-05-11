@extends('layouts.dashboard')

@section('title')
    Request service
@endsection

@section('content')
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto text-center">
                <h1 class="fw-light">Submit a service request</h1>
                <div class="card text-center">
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.request.action') }}">

                            @csrf

                            <div class="form-group py-2">
                                <label for="password">Failure Type</label>
                                <select class="form-select py-2" aria-label="Default select example" id="failure_type_id" name="failure_type_id">
                                    @foreach($failureTypes  as $ft)
                                        <option value={{ $ft->id }}>{{$ft->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group py-2">
                                <label for="password">Vehicle</label>
                                <select class="form-select py-2" aria-label="Default select example" id="vehicle_id" name="vehicle_id">
                                    @foreach($vehicles as $v)
                                        <option value={{ $v->id }}>{{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group py-2">
                                <label for="password">Description</label>
                                <textarea class="form-control" rows="4" cols="50"  id="description" name="description" placeholder="My car has a battery issue"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary py-2">Submit request</button>

                        </form>
                    </div>
                </div>
            </div>
            <img class="w-50" src="{{ url('/images/wolffix.png') }}" />
        </div>
    </div>
@endsection
