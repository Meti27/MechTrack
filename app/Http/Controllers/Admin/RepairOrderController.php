<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RepairOrder;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RepairOrderController extends Controller
{
    public function index()
    {
        $repairs = RepairOrder::with(['vehicle.customer'])->get();

        return view('admin.repairs.index', compact('repairs'));
    }

    public function create()
    {
        $vehicles = Vehicle::with('customer')->get();

        return view('admin.repairs.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id'  => 'required|exists:vehicles,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed,delivered',
            'total_cost'  => 'nullable|numeric|min:0',
        ]);

        RepairOrder::create([
            'vehicle_id'  => $request->vehicle_id,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'total_cost'  => $request->total_cost ?? 0,
        ]);

        return redirect()
            ->route('admin.repairs.index')
            ->with('status', 'Repair order created successfully!');
    }

    public function edit(RepairOrder $repair)
    {
        $vehicles = Vehicle::with('customer')->get();

        return view('admin.repairs.edit', compact('repair', 'vehicles'));
    }

    public function update(Request $request, RepairOrder $repair)
    {
        $request->validate([
            'vehicle_id'  => 'required|exists:vehicles,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed,delivered',
            'total_cost'  => 'nullable|numeric|min:0',
        ]);

        $repair->update([
            'vehicle_id'  => $request->vehicle_id,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'total_cost'  => $request->total_cost ?? 0,
        ]);

        return redirect()
            ->route('admin.repairs.index')
            ->with('status', 'Repair order updated successfully!');
    }

    public function destroy(RepairOrder $repair)
    {
        $repair->delete();

        return redirect()
            ->route('admin.repairs.index')
            ->with('status', 'Repair order deleted successfully!');
    }
}
