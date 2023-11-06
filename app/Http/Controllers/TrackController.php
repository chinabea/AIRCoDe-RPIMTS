<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class TrackController extends Controller
{
    public function track(Request $request)
    {
        // $trackingCode = $request->input('tracking_code');
        // $project = Project::where('tracking_code', $trackingCode)->first();

        // // Initialize approvalDate
        // $approvalDate = null;

        // if (!is_null($project) && $project->status === 'Approved' && $project->approval_date) {
        //     $approvalDate = $project->approval_date;
        // }

        // return view('welcome', compact('project','approvalDate'));
    
        try {
            $trackingCode = $request->input('tracking_code');
            $project = Project::where('tracking_code', $trackingCode)->first();

            // Initialize approvalDate
            $approvalDate = null;

            if (!is_null($project) && $project->status === 'Approved' && $project->approval_date) {
                $approvalDate = $project->approval_date;
            }

            return view('welcome', compact('project', 'approvalDate'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
