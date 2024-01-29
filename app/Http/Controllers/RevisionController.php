<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class RevisionController extends Controller
{
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
