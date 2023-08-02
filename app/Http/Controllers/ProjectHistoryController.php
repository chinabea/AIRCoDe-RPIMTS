<?php

namespace App\Http\Controllers;
use App\Models\ProjectHistory;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class ProjectHistoryController extends Controller
{
    public function showHistory($id)
    {
        $project = ProjectsModel::findOrFail($id); // Assuming you have a ProjectsModel representing projects
        $history = ProjectHistory::where('project_id', $id)->get();
        $projects = ProjectsModel::all();

        return view('projects.history', compact('projects', 'project', 'history'));
    }
}
