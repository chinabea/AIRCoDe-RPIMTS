<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectsModel;

class TrackController extends Controller
{
    public function track(Request $request)
    {
        $projectId = $request->input('proj_id');
        $project = ProjectsModel::find($projectId);

        // Initialize approvalDate
        $approvalDate = null;

        if (!is_null($project) && $project->status === 'Approved' && $project->approval_date) {
            $approvalDate = $project->approval_date;
        }

        return view('welcome', compact('project','approvalDate'));
    }
}
