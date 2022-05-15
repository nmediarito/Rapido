<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function registerView() {
        return view('customer.registervehicle');
    }

    public function registerAction(Request $request) {
        $newVehicle = new Vehicle();
        $userId = auth()->user()->id;
        $newVehicle->fill($request->all());
        $newVehicle->user_id = $userId;
        $newVehicle->save();

        return view('customer.registeredvehicles', [
            'vehicles' => Vehicle::where('user_id', $userId)->get(),
        ]);
    }

    public function viewVehicles() {
        $userId = auth()->user()->id;

        return view('customer.registeredvehicles', [
            'vehicles' => Vehicle::where('user_id', $userId)->get(),
        ]);
    }
}
