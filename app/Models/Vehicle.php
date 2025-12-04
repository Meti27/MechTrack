<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'customer_id',
        'license_plate',
        'make',
        'model',
        'year',
        'vin',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function repairOrders()
    {
        return $this->hasMany(RepairOrder::class);
    }
}
