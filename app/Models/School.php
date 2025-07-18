<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district',
        'ward',
        'school_type',
        'address',
        'contact_person',
        'phone',
        'email',
        'latitude',
        'longitude',
        'status'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'status' => 'boolean'
    ];

    /**
     * Get the deliveries for the school
     */
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    /**
     * Get the reports for the school
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
