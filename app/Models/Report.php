<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'district_no',
        'ward_no',
        'school_name',
        'school_type',
        'no_of_learners',
        'no_of_girls',
        'no_of_pads',
        'date_delivered',
        'remarks'
    ];
    
    protected $casts = [
        'date_delivered' => 'date',
        'no_of_learners' => 'integer',
        'no_of_girls' => 'integer',
        'no_of_pads' => 'integer',
    ];
    
    // Scopes
    public function scopeByDistrict($query, $district)
    {
        return $query->where('district_no', $district);
    }
    
    public function scopeByWard($query, $ward)
    {
        return $query->where('ward_no', $ward);
    }
    
    public function scopeBySchoolType($query, $type)
    {
        return $query->where('school_type', $type);
    }
    
    public function scopeDeliveredBetween($query, $from, $to)
    {
        return $query->whereBetween('date_delivered', [$from, $to]);
    }
}
