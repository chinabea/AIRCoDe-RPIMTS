<?php

namespace App\Http\Controllers;
use App\Models\ProjectHistory;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class ProjectHistoryController extends Controller
{
    public function showHistory($id)
    {
        $project = ProjectsModel::findOrFail($id);
        $history = ProjectHistory::where('project_id', $id)->get();
        $projects = ProjectsModel::where('status', 'For Revision')->select('*')->get();
        return view('projects.history', compact('project', 'history', 'projects'));
    }


}
