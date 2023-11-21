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
use Exception;

class ReportController extends Controller
{

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

    public function generateUsersReport()
    {
        try {
            $records = User::all();

            $pdf = PDF::loadView('reports.users-report', compact('records'));

            return $pdf->download('users-report.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function generateProjectsReport(Request $request)
    {
        try {

            $records = Project::all();
            $call_for_proposals = CallForProposal::all();

            $pdf = PDF::loadView('reports.projects-report', compact('records','call_for_proposals'));

            $page_size = $request->input('page_size', 'letter');
            $orientation = $request->input('orientation', 'portrait');
            $file_type = $request->input('file_type', 'pdf');

            $data = []; // Your report data goes here

            // $pdf = PDF::loadView('reports.projects-report', $data);
            $pdf = PDF::loadView('reports.projects-report', compact('records','call_for_proposals'));
            $pdf->setPaper($page_size, $orientation);

            if ($file_type === 'pdf') {
                return $pdf->download('report.pdf');
            } elseif ($file_type === 'excel') {
                // Add logic for Excel export if needed
                return Excel::download(new ReportController($data), 'report.xlsx');

            // return $pdf->stream('projects-report.pdf');
        }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid file type selected.');
        }
    }

    public function projectsReportExcel(Request $request)
    {
        try {
            // Retrieve data from the models
            $records = Project::all();
            $call_for_proposals = CallForProposal::all();
    
            // Combine the data into a single array
            $data = [];
    
            foreach ($records as $record) {
                $data[] = [$record->id, $record->name, /* add other fields as needed */];
            }
    
            foreach ($call_for_proposals as $proposal) {
                $data[] = [$proposal->id, $proposal->title, /* add other fields as needed */];
            }
    
            // Create a SimpleExcelWriter instance
            $writer = SimpleExcelWriter::streamDownload('exported_data.xlsx');
    
            // Add the data to the Excel file
            $writer->addRows($data);
    
            // Close the writer to finish the export
            $writer->close();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid file type.');
        }
    }

    public function generateUnderEvaluationReport()
    {
        try {
            $records = Project::where('status', 'Under Evaluation')->get();
            $call_for_proposals = CallForProposal::all();

            $pdf = PDF::loadView('reports.under-evaluation-report', compact('records','call_for_proposals'));

            return $pdf->download('under-evaluation-report.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function generateForRevisionReport()
    {
        try {
            $records = Project::where('status', 'For Revision')->get();
            $call_for_proposals = CallForProposal::all();

            $pdf = PDF::loadView('reports.for-revision-report', compact('records','call_for_proposals'));

            return $pdf->download('for-revision-report.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
