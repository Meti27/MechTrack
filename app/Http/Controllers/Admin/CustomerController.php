<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:30',
            'email'   => 'nullable|email',
            'address' => 'nullable|string|max:255',
        ]);

        Customer::create($request->all());

        return redirect()
            ->route('admin.customers.index')
            ->with('status', 'Customer added successfully!');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:30',
            'email'   => 'nullable|email',
            'address' => 'nullable|string|max:255',
        ]);

        $customer->update($request->all());

        return redirect()
            ->route('admin.customers.index')
            ->with('status', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with('status', 'Customer deleted successfully!');
    }
}
