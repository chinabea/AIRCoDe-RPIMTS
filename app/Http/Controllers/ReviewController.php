<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewDecisionModel;
use App\Models\ProjectsModel;
use App\Models\UsersModel;

class ReviewController extends Controller
{

    public function assignReviewers(Request $request, $projectId)
    {
        $reviewerRoleId = 4; // Replace with the actual role ID of reviewers

        // Retrieve users with the specified role
        $reviewers = UsersModel::where('role', $reviewerRoleId)->get();

        // Find the project
        $project = ProjectsModel::findOrFail($projectId);

        // Assign selected reviewers to the project without detaching existing reviewers
        $selectedReviewers = UsersModel::whereIn('id', $request->input('reviewer_ids'))->get();
        $project->reviewers()->syncWithoutDetaching($selectedReviewers);

        return redirect()->back()->with('success', 'Reviewers have been assigned to the project.');
    }

    public function review($id)
    {
        $records = ProjectsModel::findOrFail($id);

        return view('reviews.review-decision', compact('records'));
    }

    // functional na
    public function reviewDecision(Request $request, $id)
    {
        $reviewId = $request->input('review_id', 1);
        $requestData = $request->all();
        $requestData['review_id'] = $reviewId;
        ReviewDecisionModel::create($requestData);

        $request->validate([
            'decision' => 'required|in:Accepted,Accepted with Revision,Rejected',
        ]);

        $review = ReviewDecisionModel::find($id);
        if (!$review) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        $review->decision = $request->input('decision');
        $review->save();
        return redirect()->route('reviews.review-decision', ['id' => $id]);
    }






















    public function func()
    {
        // // Retrieve reviews for a project:
        // $project = ProjectsModel::find($projectId);
        // $reviews = $project->reviews;

        // // Retrieve projects a reviewer has reviewed:
        // $reviewer = UsersModel::find($reviewerId);
        // $reviewedProjects = $reviewer->reviewedProjects;

        // // Create a new review for a project by a reviewer:
        // $project = ProjectsModel::find($projectId);
        // $reviewer = UsersModel::find($reviewerId);

        // $review = new ReviewModel([
        //     'rating' => $rating,
        //     'comment' => $comment,
        // ]);

        // $project->reviews()->save($review, ['user_id' => $reviewer->id]);


    }

}
