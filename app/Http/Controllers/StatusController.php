<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusModel;
use App\Models\UsersModel;
use App\Models\User;
use App\Models\Review;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StatusController extends Controller
{

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Draft,Under Evaluation,For Revision,Approved,Deferred,Disapproved',
        ]);

        $project = Project::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        // $project->status = $request->input('status');

        // // Check if the new status is 'Approved' and the current status is not 'Approved'
        // if ($newStatus === 'Approved' && $project->status !== 'Approved') {
        //     // Set the approval_date to the current date and time
        //     $project->approval_date = Carbon::now();
        // }



        $newStatus = $request->input('status');

        // Check if the new status is 'Approved' and the current status is not 'Approved'
        if ($newStatus === 'Approved' && $project->status !== 'Approved') {
            // Set the approval_date to the current date and time
            $project->approval_date = Carbon::now();
        }

        $project->status = $newStatus;

        $project->save();
        return redirect()->route('submission-details.show', ['id' => $id])->with('success', 'Project status updated successfully.');
    }

    public function draft()
    {
        $projects = Project::where('status', 'Draft')->get();

        return view('status.draft', compact('projects'));
    }

    public function underEvaluation()
    {
        $projects = Project::where('status', 'Under Evaluation')->get();
        $reviews = Review::all();

        return view('status.under-evaluation', compact('projects'));
    }

    public function forRevision()
    {
        $projects = Project::where('status', 'For Revision')->get();
        return view('status.for-revision', compact('projects'));
    }

    public function approved()
    {
        $approvedprojs = Project::where('status', 'Approved')->get();

        // Fetch the approval date for each approved project
        foreach ($approvedprojs as $project) {
            $project->approvalDate = $project->approval_date;
        }

        return view('status.approved', compact('approvedprojs'));
    }

    public function deferred()
    {
        $projects = Project::where('status', 'Deferred')->get();
        return view('status.deferred', compact('projects'));
    }

    public function disapproved()
    {
        $projects = Project::where('status', 'Disapproved')->get();
        return view('status.disapproved', compact('projects'));
    }

    public function forRevisionSidebar()
    {
        // $projects = Project::all();
        $projects = Project::where('status', 'For Revision')->get();
        return view('dashboard', compact('projects'));
    }

}
