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

    public function generateRevisionReport($id)
    {

        try {
            $data = Version::findOrFail($id);
            $projMembers = Member::where('id', $id)->get();
            $records = Project::with('versions')->findOrFail($id);
            $pdf = PDF::loadView('reports.version-report', ['data' => $data, 'projMembers' => $projMembers, 'records' => $records]);

            $filename = Str::slug($data->project_name) . '.pdf';

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

    public function searchProjects(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);
    
            // Your search logic here based on $request->start_date and $request->end_date
            // Example: 
            $projects = Project::whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59'])->get();
    
            // Load the search results into a Blade view
            $html = view('projects.index', compact('projects'))->render();
    
            // Return the search results as JSON
            return response()->json(['html' => $html]);
    
        } catch (\Exception $e) {
            // Handle any errors that may occur during the search
            return response()->json(['error' => $e->getMessage()], 500);
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

            // $start_date = $request->input('start_date');
            // $end_date = $request->input('end_date');
    
            // // Adjust database query to filter records based on the date range
            // $records = Project::whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])->get();
            $call_for_proposals = CallForProposal::all();
    
            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');
    
            $data = [];
    
            $pdf = PDF::loadView('reports.projects-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);
    
            if ($file_type === 'pdf') {
                return $pdf->stream('projects-report.pdf');
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
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'Under Evaluation')->
            whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])->get();

            // $records = Project::where('status', 'Under Evaluation')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $pdf = PDF::loadView('reports.under-evaluation-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->stream('under-evaluation-report.pdf');
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
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'For Revision')->
            whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])->get();

            // $records = Project::where('status', 'For Revision')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $pdf = PDF::loadView('reports.for-revision-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->stream('for-revision-report.pdf');
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
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'Approved')->
            whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])->get();

            // $records = Project::where('status', 'Approved')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $pdf = PDF::loadView('reports.approved-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->stream('approved-report.pdf');
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
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
    
            // Adjust database query to filter records based on the date range
            $records = Project::where('status', 'Disapproved')->
            whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59'])->get();

            // $records = Project::where('status', 'Disapproved')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = [];

            $pdf = PDF::loadView('reports.disapproved-report', compact('records', 'call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->stream('disapproved-report.pdf');
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























