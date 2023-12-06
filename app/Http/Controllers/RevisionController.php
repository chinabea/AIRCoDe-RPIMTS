<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class RevisionController extends Controller
{
    // public function saveRevision(Request $request, $originalProposalId)
    // {
    //     // Get the latest version for the original proposal
    //     $latestVersion = Project::where('original_proposal_id', $originalProposalId)
    //         ->max('version');

    //     // Increment the version number
    //     $version = $latestVersion + 1;

    //     // Get the changes made in this revision
    //     $changes = $request->input('changes');

    //     // Save the new revision
    //     $proposal = new Project();
    //     $proposal->original_proposal_id = $originalProposalId;
    //     $proposal->version = $version;
    //     $proposal->changes = $changes;
    //     // Set other fields...
    //     $proposal->save();

    //     // Redirect or respond as needed
    // }

    public function index()
    {
        try {
            // Fetch records and related data from the database
            $revised = Revision::all();
            // $reviewers = User::whereIn('id', Review::pluck('user_id'))->get();
            $call_for_proposals = CallForProposal::all();

            return view('submission-details.show', compact('revised', 'call_for_proposals'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while fetching project data: ' . $e->getMessage());
        }
    }

}
