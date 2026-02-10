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
            'license_plate' => ['required', 'string', 'max:20'],
        ]);

        // Normalize for better matching
        $plate = strtoupper(trim($request->license_plate));

        $vehicle = Vehicle::with([
            'customer',
            'repairOrders' => function ($query) {
                $query->orderByDesc('created_at');
            }
        ])
            ->where('license_plate', $plate)
            ->first();

        if (!$vehicle || $vehicle->repairOrders->isEmpty()) {
            return back()
                ->withInput()
                ->with('status', 'No repair history found for this license plate.');
        }

        return view('public.track', [
            'vehicle' => $vehicle,
            'repairs' => $vehicle->repairOrders,
        ]);
    }
}
