<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairOrder extends Model
{
    protected $fillable = [
        'vehicle_id',
        'title',
        'description',
        'status',
        'total_cost',
        'started_at',
        'completed_at',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function items()
    {
        return $this->hasMany(\App\Models\RepairItem::class);
    }

}
