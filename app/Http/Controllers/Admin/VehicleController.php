<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('customer')->get();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $customers = Customer::all();

        return view('admin.vehicles.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'   => 'required|exists:customers,id',
            'license_plate' => 'required|string|max:50|unique:vehicles,license_plate',
            'make'          => 'nullable|string|max:100',
            'model'         => 'nullable|string|max:100',
            'year'          => 'nullable|integer',
            'vin'           => 'nullable|string|max:100',
        ]);

        Vehicle::create($request->all());

        return redirect()
            ->route('admin.vehicles.index')
            ->with('status', 'Vehicle added successfully!');
    }

    public function edit(Vehicle $vehicle)
    {
        $customers = Customer::all();

        return view('admin.vehicles.edit', compact('vehicle', 'customers'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'customer_id'   => 'required|exists:customers,id',
            'license_plate' => 'required|string|max:50|unique:vehicles,license_plate,' . $vehicle->id,
            'make'          => 'nullable|string|max:100',
            'model'         => 'nullable|string|max:100',
            'year'          => 'nullable|integer',
            'vin'           => 'nullable|string|max:100',
        ]);

        $vehicle->update($request->all());

        return redirect()
            ->route('admin.vehicles.index')
            ->with('status', 'Vehicle updated successfully!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('admin.vehicles.index')
            ->with('status', 'Vehicle deleted successfully!');
    }
}
