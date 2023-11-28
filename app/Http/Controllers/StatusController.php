<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Http\Request;
// use App\Models\StatusModel;
// use App\Models\UsersModel;
// use App\Models\User;
use App\Models\Review;
use App\Models\Project;
use App\Models\CallForProposal;

class StatusController extends Controller
{

    // public function updateStatus(Request $request, $id)
    // {
    //     $request->validate([
    //         'status' => 'required|in:Draft,Under Evaluation,For Revision,Approved,Deferred,Disapproved',
    //     ]);

    //     $project = Project::find($id);
    //     if (!$project) {
    //         return redirect()->back()->with('error', 'Project not found.');
    //     }

    //     // $project->status = $request->input('status');

    //     // // Check if the new status is 'Approved' and the current status is not 'Approved'
    //     // if ($newStatus === 'Approved' && $project->status !== 'Approved') {
    //     //     // Set the approval_date to the current date and time
    //     //     $project->approval_date = Carbon::now();
    //     // }

    //     $newStatus = $request->input('status');

    //     // Check if the new status is 'Approved' and the current status is not 'Approved'
    //     if ($newStatus === 'Approved' && $project->status !== 'Approved') {
    //         // Set the approval_date to the current date and time
    //         $project->approval_date = Carbon::now();
    //     }

    //     $project->status = $newStatus;

    //     $project->save();
    //     return redirect()->route('submission-details.show', ['id' => $id])->with('success', 'Project status updated successfully.');
    // }

    // public function draft()
    // {
    //     $projects = Project::where('status', 'Draft')->get();
    //     $call_for_proposals = CallForProposal::all();

    //     return view('status.draft', compact('projects', 'call_for_proposals'));
    // }

    // public function underEvaluation()
    // {
    //     $projects = Project::where('status', 'Under Evaluation')->get();
    //     $reviews = Review::all();
    //     $call_for_proposals = CallForProposal::all();

    //     return view('status.under-evaluation', compact('projects', 'call_for_proposals'));
    // }

    // public function forRevision()
    // {
    //     $projects = Project::where('status', 'For Revision')->get();
    //     $call_for_proposals = CallForProposal::all();

    //     return view('status.for-revision', compact('projects', 'call_for_proposals'));
    // }

    // public function approved()
    // {
    //     $approvedprojs = Project::where('status', 'Approved')->get();
    //     $call_for_proposals = CallForProposal::all();

    //     // Fetch the approval date for each approved project
    //     foreach ($approvedprojs as $project) {
    //         $project->approvalDate = $project->approval_date;
    //     }

    //     return view('status.approved', compact('approvedprojs', 'call_for_proposals'));
    // }

    // public function deferred()
    // {
    //     $projects = Project::where('status', 'Deferred')->get();
    //     $call_for_proposals = CallForProposal::all();

    //     return view('status.deferred', compact('projects', 'call_for_proposals'));
    // }

    // public function disapproved()
    // {
    //     $projects = Project::where('status', 'Disapproved')->get();
    //     $call_for_proposals = CallForProposal::all();

    //     return view('status.disapproved', compact('projects', 'call_for_proposals'));
    // }

    // public function forRevisionSidebar()
    // {
    //     // $projects = Project::all();
    //     $projects = Project::where('status', 'For Revision')->get();
    //     $call_for_proposals = CallForProposal::all();

    //     return view('dashboard', compact('projects', 'call_for_proposals'));
    // }

        public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:Draft,Under Evaluation,For Revision,Approved,Deferred,Disapproved',
            ]);

            $project = Project::find($id);
            if (!$project) {
                return redirect()->back()->with('error', 'Project not found.');
            }

            $newStatus = $request->input('status');

            if ($newStatus === 'Approved' && $project->status !== 'Approved') {
                $project->approval_date = Carbon::now();
            }

            $project->status = $newStatus;

            $project->save();
            return redirect()->route('submission-details.show', ['id' => $id])->with('success', 'Project status updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function draft()
    {
        try {
            $projects = Project::where('status', 'Draft')->get();
            $call_for_proposals = CallForProposal::all();
            
            return view('status.draft', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function underEvaluation()
    {
        try {
            $projects = Project::where('status', 'Under Evaluation')->get();
            $reviews = Review::all();
            $call_for_proposals = CallForProposal::all();

            return view('status.under-evaluation', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function forRevision()
    {
        try {
            $projects = Project::where('status', 'For Revision')->get();
            $call_for_proposals = CallForProposal::all();

            return view('status.for-revision', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function approved()
    {
        try {
            $approvedprojs = Project::where('status', 'Approved')->get();
            $call_for_proposals = CallForProposal::all();

            foreach ($approvedprojs as $project) {
                $project->approvalDate = $project->approval_date;
            }

            return view('status.approved', compact('approvedprojs', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function deferred()
    {
        try {
            $projects = Project::where('status', 'Deferred')->get();
            $call_for_proposals = CallForProposal::all();

            return view('status.deferred', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function disapproved()
    {
        try {
            $projects = Project::where('status', 'Disapproved')->get();
            $call_for_proposals = CallForProposal::all();

            return view('status.disapproved', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function forRevisionSidebar()
    {
        try {
            $projects = Project::where('status', 'For Revision')->get();
            $call_for_proposals = CallForProposal::all();

            return view('dashboard', compact('projects', 'call_for_proposals'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


}
