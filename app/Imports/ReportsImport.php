<?php

namespace App\Imports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;

class ReportsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $dateDelivered = null;
        if (!empty($row['date_delivered'])) {
            try {
                $dateDelivered = Carbon::parse($row['date_delivered'])->format('Y-m-d');
            } catch (\Exception $e) {
                // If date parsing fails, leave as null
            }
        }
        
        return new Report([
            'district_no' => $row['district_no'] ?? '',
            'ward_no' => $row['ward_no'] ?? '',
            'school_name' => $row['school_name'] ?? '',
            'school_type' => $row['school_type'] ?? '',
            'no_of_learners' => (int) ($row['no_of_learners'] ?? 0),
            'no_of_girls' => (int) ($row['no_of_girls'] ?? 0),
            'no_of_pads' => (int) ($row['no_of_pads'] ?? 0),
            'date_delivered' => $dateDelivered,
            'remarks' => $row['remarks'] ?? '',
        ]);
    }
    
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'district_no' => 'required|string|max:255',
            'ward_no' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'school_type' => 'required|string|max:255',
            'no_of_learners' => 'integer|min:0',
            'no_of_girls' => 'integer|min:0',
            'no_of_pads' => 'integer|min:0',
        ];
    }
}
