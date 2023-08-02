<?php

namespace App\Http\Controllers;
use App\Models\ProjectHistory;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class ProjectHistoryController extends Controller
{
    public function showHistory($id)
    {
        $project = ProjectsModel::findOrFail($id); // Fetch the specific project using its ID
        $history = ProjectHistory::where('project_id', $id)->get(); // Fetch the history related to the project

        $projects = ProjectsModel::where('status', 'For Revision')->get(); // Fetch all projects with status "For Revision"

        return view('projects.history', compact('project', 'history', 'projects'));
    }


}
