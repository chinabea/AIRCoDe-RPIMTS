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

            $records = Project::all();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = []; 
            
            $pdf = PDF::loadView('reports.projects-report', compact('records','call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('projects-report.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
        }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid file type selected.');
        }
    }

    public function generateUnderEvaluationReport(Request $request)
    {
        try {
            $records = Project::where('status', 'Under Evaluation')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = []; 

            $pdf = PDF::loadView('reports.under-evaluation-report', compact('records','call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('under-evaluation-report.pdf');
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
            $records = Project::where('status', 'For Revision')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = []; 

            $pdf = PDF::loadView('reports.for-revision-report', compact('records','call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('for-revision-report.pdf');
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

            $pdf = PDF::loadView('reports.deferred-report', compact('records','call_for_proposals'));
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
            $records = Project::where('status', 'Approved')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = []; 

            $pdf = PDF::loadView('reports.approved-report', compact('records','call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('approved-report.pdf');
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
            $records = Project::where('status', 'Disapproved')->get();
            $call_for_proposals = CallForProposal::all();

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = []; 

            $pdf = PDF::loadView('reports.disapproved-report', compact('records','call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('disapproved-report.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');
            }

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
























// public function projectsReportExcel(Request $request)
// {
//     try {
//         // Retrieve data from the models
//         $records = Project::all();
//         $call_for_proposals = CallForProposal::all();

//         // Combine the data into a single array
//         $data = [];

//         foreach ($records as $record) {
//             $data[] = [$record->id, $record->name, /* add other fields as needed */];
//         }

//         foreach ($call_for_proposals as $proposal) {
//             $data[] = [$proposal->id, $proposal->title, /* add other fields as needed */];
//         }

//         // Create a SimpleExcelWriter instance
//         $writer = SimpleExcelWriter::streamDownload('exported_data.xlsx');

//         // Add the data to the Excel file
//         $writer->addRows($data);

//         // Close the writer to finish the export
//         $writer->close();
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Invalid file type.');
//     }
// }
