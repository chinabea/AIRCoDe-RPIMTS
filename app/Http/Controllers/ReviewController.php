<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewModel;
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
