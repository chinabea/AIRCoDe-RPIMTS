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

        return view('welcome', compact('project'));
    }
}
