<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Project;
use App\Models\Member;
// use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function generatePDF($data_id)
    {

        try {
            $data = Project::findOrFail($data_id);
            $projMembers = Member::where('project_id', $data_id)->get();

            $pdf = PDF::loadView('exports.report', ['data' => $data, 'projMembers' => $projMembers]);

            $filename = Str::slug($data->projname) . '.pdf';

            return $pdf->download($filename);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

}

