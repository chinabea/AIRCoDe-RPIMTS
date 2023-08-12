<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusModel;
use App\Models\ProjectsModel;

class StatusController extends Controller
{
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Draft,Under Evaluation,For Revision,Approved,Deferred,Disapproved',
        ]);

        $project = ProjectsModel::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        $project->status = $request->input('status');
        $project->save();
        return redirect()->route('submission-details.show', ['id' => $id])->with('success', 'Project status updated successfully.');
    }

    public function draft()
    {
        $projects = ProjectsModel::where('status', 'Draft')->get();
        return view('status.draft', compact('projects'));
    }

    public function underEvaluation()
    {
        $projects = ProjectsModel::where('status', 'Under Evaluation')->get();
        return view('status.under-evaluation', compact('projects'));
    }

    public function forRevision()
    {
        $projects = ProjectsModel::where('status', 'For Revision')->get();
        return view('status.for-revision', compact('projects'));
    }

    public function approved()
    {
        $projects = ProjectsModel::where('status', 'Approved')->get();
        return view('status.approved', compact('projects'));
    }

    public function deferred()
    {
        $projects = ProjectsModel::where('status', 'Deferred')->get();
        return view('status.deferred', compact('projects'));
    }

    public function disapproved()
    {
        $projects = ProjectsModel::where('status', 'Disapproved')->get();
        return view('status.disapproved', compact('projects'));
    }

    public function forRevisionSidebar()
    {
        // $projects = ProjectsModel::all();
        $projects = ProjectsModel::where('status', 'For Revision')->get();
        return view('dashboard', compact('projects'));
    }

}
