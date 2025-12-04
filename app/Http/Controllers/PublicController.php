<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function showTrackForm()
    {
        return view('public.track');
    }

    public function trackRepair(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string',
            'phone'         => 'required|string',
        ]);

        $vehicle = Vehicle::with([
            'customer',
            'repairOrders' => function ($query) {
                $query->orderByDesc('created_at');
            }
        ])
            ->where('license_plate', $request->license_plate)
            ->whereHas('customer', function ($query) use ($request) {
                $query->where('phone', $request->phone);
            })
            ->first();

        if (!$vehicle || $vehicle->repairOrders->isEmpty()) {
            return back()
                ->withInput()
                ->with('status', 'No repair history found for this vehicle & phone combination.');
        }

        return view('public.track', [
            'vehicle' => $vehicle,
            'repairs' => $vehicle->repairOrders,
        ]);
    }
}
