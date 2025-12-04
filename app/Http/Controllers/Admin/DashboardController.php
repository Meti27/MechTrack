<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\RepairOrder;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalVehicles  = Vehicle::count();
        $totalRepairs   = RepairOrder::count();

        $pendingRepairs     = RepairOrder::where('status', 'pending')->count();
        $inProgressRepairs  = RepairOrder::where('status', 'in_progress')->count();
        $completedRepairs   = RepairOrder::where('status', 'completed')->count();
        $deliveredRepairs   = RepairOrder::where('status', 'delivered')->count();

        $totalRevenue = RepairOrder::sum('total_cost');

        return view('admin.dashboard', compact(
            'totalCustomers',
            'totalVehicles',
            'totalRepairs',
            'pendingRepairs',
            'inProgressRepairs',
            'completedRepairs',
            'deliveredRepairs',
            'totalRevenue'
        ));
    }
}
