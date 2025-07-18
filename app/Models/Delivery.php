<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'order_number',
        'delivery_date',
        'quantity',
        'status',
        'driver_name',
        'vehicle_number',
        'notes',
        'proof_of_delivery'
    ];

    protected $casts = [
        'delivery_date' => 'datetime',
        'quantity' => 'integer'
    ];

    /**
     * Get the school that owns the delivery
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get the reports for the delivery
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
