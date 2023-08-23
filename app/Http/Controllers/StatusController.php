<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusModel;
use App\Models\UsersModel;
use App\Models\User;
use App\Models\ProjectsModel;
use Illuminate\Support\Facades\Auth;

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
    public function countStatuses()
    {
        $draftCount = ProjectsModel::where('status', 'Draft')->count();
        $underEvaluationCount = ProjectsModel::where('status', 'Under Evaluation')->count();
        $forRevisionCount = ProjectsModel::where('status', 'For Revision')->count();
        $approvedCount = ProjectsModel::where('status', 'Approved')->count();
        $deferredCount = ProjectsModel::where('status', 'Deferred')->count();
        $disapprovedCount = ProjectsModel::where('status', 'Disapproved')->count();
        
        return view('dashboard', compact('draftCount','underEvaluationCount','underEvaluationCount','forRevisionCount',
                    'approvedCount','deferredCount','disapprovedCount'));
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
        $approvedprojs = ProjectsModel::where('status', 'Approved')->get();
        return view('status.approved', compact('approvedprojs'));
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
