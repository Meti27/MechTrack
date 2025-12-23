@extends('layouts.mechtrack')

@section('title', 'Add Repair Order')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Add New Repair Order</h2>

        <form method="POST" action="{{ route('admin.repairs.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Vehicle</label>
                <select name="vehicle_id" class="form-select" required>
                    <option value="">-- Select vehicle --</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}"
                            {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                            {{ $vehicle->license_plate }} -
                            {{ $vehicle->customer->name ?? 'No owner' }}
                        </option>
                    @endforeach
                </select>
                @error('vehicle_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title') }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    @php
                        $statuses = ['pending', 'in_progress', 'completed', 'delivered'];
                    @endphp

                    @foreach($statuses as $status)
                        <option value="{{ $status }}"
                            {{ old('status', 'pending') == $status ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Total Cost (€)</label>
                <input type="number" step="0.01" min="0"
                       name="total_cost" class="form-control"
                       value="{{ old('total_cost', 0) }}">
                @error('total_cost') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Repair Order</button>
            <a href="{{ route('admin.repairs.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
                </div>
                <hr class="my-4">

                <h5 class="mb-2">Repair Items (Fixes Done)</h5>
                <p class="text-white-50 mb-3">Add the work/parts + cost. This builds repair history.</p>

                <div id="itemsWrap" class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                        <input type="text" name="items[0][description]" class="form-control" placeholder="e.g. Oil change">
                        <input type="number" step="0.01" name="items[0][cost]" class="form-control" placeholder="Cost (€)" style="max-width: 160px;">
                        <button type="button" class="btn btn-outline-light" onclick="removeRow(this)">✕</button>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-light mt-3" onclick="addRow()">+ Add item</button>

                <script>
                    let itemIndex = 1;

                    function addRow() {
                        const wrap = document.getElementById('itemsWrap');
                        const row = document.createElement('div');
                        row.className = "d-flex gap-2";
                        row.innerHTML = `
            <input type="text" name="items[${itemIndex}][description]" class="form-control" placeholder="e.g. Brake pads">
            <input type="number" step="0.01" name="items[${itemIndex}][cost]" class="form-control" placeholder="Cost (€)" style="max-width: 160px;">
            <button type="button" class="btn btn-outline-light" onclick="removeRow(this)">✕</button>
        `;
                        wrap.appendChild(row);
                        itemIndex++;
                    }

                    function removeRow(btn) {
                        btn.parentElement.remove();
                    }
                </script>

            </div>
        </div>
    </div>
@endsection
