@extends('layouts.mechtrack')

@section('title', 'Customers')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Customers</h1>
        <p class="">Manage your workshop customers.</p>
    </div>

    <div class="mb-3">
        <a href="{{ route('admin.customers.create') }}" class="btn btn-amber">
            + Add New Customer
        </a>
    </div>

    {{-- Desktop / tablet: table --}}
    <div class="d-none d-md-block">
        <div class="card card-mechtrack">
            <div class="card-body">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th style="width: 170px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email ?: '—' }}</td>
                            <td>
                                <a href="{{ route('admin.customers.edit', $customer) }}"
                                   class="btn btn-sm btn-outline-light">
                                    Edit
                                </a>

                                <form action="{{ route('admin.customers.destroy', $customer) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this customer?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class=" text-center">
                                No customers yet.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Mobile: cards --}}
    <div class="d-block d-md-none">
        @forelse($customers as $customer)
            <div class="card card-mechtrack mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-1">{{ $customer->name }}</h5>
                    <p class="mb-1">
                        <small class="">ID: {{ $customer->id }}</small>
                    </p>
                    <p class="mb-1"><strong>Phone:</strong> {{ $customer->phone }}</p>
                    <p class="mb-3"><strong>Email:</strong> {{ $customer->email ?: '—' }}</p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.customers.edit', $customer) }}"
                           class="btn btn-sm btn-outline-light flex-grow-1">
                            Edit
                        </a>

                        <form action="{{ route('admin.customers.destroy', $customer) }}"
                              method="POST"
                              class="flex-grow-1"
                              onsubmit="return confirm('Delete this customer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="card card-mechtrack">
                <div class="card-body text-center ">
                    No customers yet.
                </div>
            </div>
        @endforelse
    </div>
@endsection
