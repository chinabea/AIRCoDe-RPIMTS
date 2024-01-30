<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\CallForProposal;
use App\Models\Project;
use App\Models\Member;
use App\Models\User;
use App\Models\Version;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReportController extends Controller
{
    
    public function searchProjects(Request $request)
    {
        try {
            $filterType = $request->input('filter_type');
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $year = $request->input('year');

            // Initial query builder for projects
            $query = Project::query();

            // Add conditions based on the filter type
            if ($filterType === 'date') {
                $query->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
            } elseif ($filterType === 'year') {
                // Assuming 'created_at' is the date field, adjust it based on your actual date field
                $query->whereYear('created_at', $year);
            }

            // Fetch projects based on the conditions
            $projects = $query->get();

            // You can return the projects to the view or format the data as needed
            $html = view('projects.search-results', compact('projects'))->render();

            return response()->json(['html' => $html]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        } 
    }

    public function generateRevisionReport($id)
    {
        try {
            $data = Version::findOrFail($id);
            $projMembers = Member::where('id', $id)->get();
            $records = Project::with('versions')->findOrFail($id);
            
            // Include the version number in the filename
            $filename = Str::slug($data->project_name) . '-version' . $data->version_number . '.pdf';

            $pdf = PDF::loadView('reports.version-report', ['data' => $data, 'projMembers' => $projMembers, 'records' => $records]);

            return $pdf->download($filename);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function generateProjectReport($data_id)
    {

        try {

            $data = Project::findOrFail($data_id);
            $projMembers = Member::where('project_id', $data_id)->get();

            $pdf = PDF::loadView('reports.project-report', ['data' => $data, 'projMembers' => $projMembers]);

            $filename = Str::slug($data->project_name) . '.pdf';

            return $pdf->download($filename);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function generateUsersReport(Request $request)
    {
        try {
            $records = User::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $pdf = PDF::loadView('reports.users-report', compact('records'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('users-report.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid file type selected.');
        }
    }


    public function generateProjectsReport(Request $request)
    {
        try {
            $filterType = $request->input('filter_type');
    
            // Check the filter type and apply appropriate logic
            if ($filterType === 'year') {
                $year = $request->input('year');
                $start_date = Carbon::createFromDate($year, 1, 1)->startOfDay();
                $end_date = Carbon::createFromDate($year, 12, 31)->endOfDay();
            } else {
                $start_date = $request->input('start_date') . ' 00:00:00';
                $end_date = $request->input('end_date') . ' 23:59:59';
            }
    
            // Adjust database query to filter records based on the date range
            $records = Project::whereBetween('created_at', [$start_date, $end_date])->get();
            $call_for_proposals = CallForProposal::all();
    
            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');
    
            $data = [];

            $formattedStartDate = Carbon::parse($start_date)->format('Ymd');
            $formattedEndDate = Carbon::parse($end_date)->format('Ymd');
    
            $pdf = PDF::loadView('reports.projects-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);
    
            if ($file_type === 'pdf') {
                return $pdf->download('projects-report-' . $formattedStartDate . '-' . $formattedEndDate . '.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    

    public function generateUnderEvaluationReport(Request $request)
    {
        try {
            $filterType = $request->input('filter_type');
    
            // Check the filter type and apply appropriate logic
            if ($filterType === 'year') {
                $year = $request->input('year');
                $start_date = Carbon::createFromDate($year, 1, 1)->startOfDay();
                $end_date = Carbon::createFromDate($year, 12, 31)->endOfDay();
            } else {
                $start_date = $request->input('start_date') . ' 00:00:00';
                $end_date = $request->input('end_date') . ' 23:59:59';
            }
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'Under Evaluation')->whereBetween('created_at', [$start_date, $end_date])->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $formattedStartDate = Carbon::parse($start_date)->format('Ymd');
            $formattedEndDate = Carbon::parse($end_date)->format('Ymd');

            $pdf = PDF::loadView('reports.under-evaluation-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                // return $pdf->stream('under-evaluation-report.pdf');
                return $pdf->download('under-evaluation-report-' . $formattedStartDate . '-' . $formattedEndDate . '.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function generateForRevisionReport(Request $request)
    {
        try {
            $filterType = $request->input('filter_type');
    
            // Check the filter type and apply appropriate logic
            if ($filterType === 'year') {
                $year = $request->input('year');
                $start_date = Carbon::createFromDate($year, 1, 1)->startOfDay();
                $end_date = Carbon::createFromDate($year, 12, 31)->endOfDay();
            } else {
                $start_date = $request->input('start_date') . ' 00:00:00';
                $end_date = $request->input('end_date') . ' 23:59:59';
            }
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'For Revision')->whereBetween('created_at', [$start_date, $end_date])->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $formattedStartDate = Carbon::parse($start_date)->format('Ymd');
            $formattedEndDate = Carbon::parse($end_date)->format('Ymd');

            $pdf = PDF::loadView('reports.for-revision-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                // return $pdf->stream('for-revision-report.pdf');
                return $pdf->download('for-revision-report-' . $formattedStartDate . '-' . $formattedEndDate . '.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function generateDeferredReport(Request $request)
    {
        try {
            $records = Project::where('status', 'Deferred')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $pdf = PDF::loadView('reports.deferred-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('deferred-report.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function generateApprovedReport(Request $request)
    {
        try {
            $filterType = $request->input('filter_type');
    
            // Check the filter type and apply appropriate logic
            if ($filterType === 'year') {
                $year = $request->input('year');
                $start_date = Carbon::createFromDate($year, 1, 1)->startOfDay();
                $end_date = Carbon::createFromDate($year, 12, 31)->endOfDay();
            } else {
                $start_date = $request->input('start_date') . ' 00:00:00';
                $end_date = $request->input('end_date') . ' 23:59:59';
            }
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'Approved')->whereBetween('created_at', [$start_date, $end_date])->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $formattedStartDate = Carbon::parse($start_date)->format('Ymd');
            $formattedEndDate = Carbon::parse($end_date)->format('Ymd');

            $pdf = PDF::loadView('reports.approved-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                // return $pdf->stream('approved-report.pdf');
                return $pdf->download('approved-report-' . $formattedStartDate . '-' . $formattedEndDate . '.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function generateDisapprovedReport(Request $request)
    {
        try {
            $filterType = $request->input('filter_type');
    
            // Check the filter type and apply appropriate logic
            if ($filterType === 'year') {
                $year = $request->input('year');
                $start_date = Carbon::createFromDate($year, 1, 1)->startOfDay();
                $end_date = Carbon::createFromDate($year, 12, 31)->endOfDay();
            } else {
                $start_date = $request->input('start_date') . ' 00:00:00';
                $end_date = $request->input('end_date') . ' 23:59:59';
            }
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'Disapproved')->whereBetween('created_at', [$start_date, $end_date])->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $formattedStartDate = Carbon::parse($start_date)->format('Ymd');
            $formattedEndDate = Carbon::parse($end_date)->format('Ymd');

            $pdf = PDF::loadView('reports.disapproved-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                // return $pdf->stream('disapproved-report.pdf');
                return $pdf->download('disapproved-report-' . $formattedStartDate . '-' . $formattedEndDate . '.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
    public function generateCallforProposalsReport(Request $request)
    {
        try {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // Adjust database query to filter records based on the date range
            $call_for_proposals = CallForProposal::whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])->get();
            // $call_for_proposals = CallForProposal::all();
    
            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');
    
            $data = [];
    
            $pdf = PDF::loadView('reports.call-for-proposals-report', compact('call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);
    
            if ($file_type === 'pdf') {
                return $pdf->stream('call-for-proposals-report.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}























