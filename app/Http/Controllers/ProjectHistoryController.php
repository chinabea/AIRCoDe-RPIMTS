<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Project;
// use Illuminate\Http\Request;

class ProjectHistoryController extends Controller
{
    public function showHistory($id)
    {
        $project = Project::all();
        $history = History::where('project_id', $id)->get();
        $projects = Project::where('status', 'For Revision')->select('*')->get();
        return view('projects.history', compact('project', 'history', 'projects'));
    }


}
