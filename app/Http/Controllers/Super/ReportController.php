<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReportsImport;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::query();
        
        // Apply filters
        if ($request->filled('district')) {
            $query->where('district_no', $request->district);
        }
        
        if ($request->filled('ward')) {
            $query->where('ward_no', $request->ward);
        }
        
        if ($request->filled('school_type')) {
            $query->where('school_type', $request->school_type);
        }
        
        if ($request->filled('date_from')) {
            $query->whereDate('date_delivered', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('date_delivered', '<=', $request->date_to);
        }
        
        $reports = $query->orderBy('created_at', 'desc')->paginate(20);
        
        $districts = Report::distinct('district_no')->pluck('district_no');
        $wards = Report::distinct('ward_no')->pluck('ward_no');
        $schoolTypes = Report::distinct('school_type')->pluck('school_type');
        
        return view('super.reports.index', compact('reports', 'districts', 'wards', 'schoolTypes'));
    }
    
    public function import()
    {
        return view('super.reports.import');
    }
    
    public function processImport(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ]);
        
        try {
            Excel::import(new ReportsImport, $request->file('file'));
            
            return redirect()->route('reports.index')
                ->with('success', 'Reports imported successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }
    
    public function analytics()
    {
        $totalReports = Report::count();
        $totalLearners = Report::sum('no_of_learners');
        $totalGirls = Report::sum('no_of_girls');
        $totalPads = Report::sum('no_of_pads');
        
        $reportsByDistrict = Report::select('district_no', DB::raw('count(*) as count'))
            ->groupBy('district_no')
            ->get();
            
        $reportsBySchoolType = Report::select('school_type', DB::raw('count(*) as count'))
            ->groupBy('school_type')
            ->get();
            
        $monthlyReports = Report::select(
                DB::raw('DATE_FORMAT(date_delivered, "%Y-%m") as month'),
                DB::raw('count(*) as count')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        return view('super.reports.analytics', compact(
            'totalReports', 'totalLearners', 'totalGirls', 'totalPads',
            'reportsByDistrict', 'reportsBySchoolType', 'monthlyReports'
        ));
    }
    
    public function filter(Request $request)
    {
        $query = Report::query();
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('school_name', 'LIKE', "%{$search}%")
                  ->orWhere('district_no', 'LIKE', "%{$search}%")
                  ->orWhere('ward_no', 'LIKE', "%{$search}%");
            });
        }
        
        $reports = $query->orderBy('created_at', 'desc')->get();
        
        return response()->json($reports);
    }
}
