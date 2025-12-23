<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $customers = Customer::with(['vehicles.repairOrders' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])
            ->when($search, function($query) use ($search) {
                $query->where(function($q) use ($search) {
                    // Search by customer name, phone, or email
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        // Search by vehicle details
                        ->orWhereHas('vehicles', function($vehicleQuery) use ($search) {
                            $vehicleQuery->where('make', 'like', "%{$search}%")
                                ->orWhere('model', 'like', "%{$search}%")
                                ->orWhere('license_plate', 'like', "%{$search}%")
                                ->orWhere('vin', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('admin.customers.history', compact('customers', 'search'));
    }
}
