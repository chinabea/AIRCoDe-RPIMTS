<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewModel;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\User;

class ReviewController extends Controller
{
    public function selectReviewers()
    {
        $reviewers = UsersModel::where('role', 4)->get();
    
        return view('submission-details.reviews.select-reviewer', compact('reviewers'));
    }

    public function assignReviewers(Request $request)
    {
        $projectId = $request->input('project_id', 1);
    
        // Find users with role = 4
        $reviewerUsers = UsersModel::where('role', 4)->get();
    
        // Extract reviewer IDs from the users
        $reviewerIds = $reviewerUsers->pluck('id')->toArray();
    
        $project = ProjectsModel::find($projectId);
    
        // Update the relationship by syncing reviewer IDs
        $project->reviewers()->sync($reviewerIds);
    
        return redirect()->route('selectReviewers')->with('success', 'Reviewers assigned successfully.');
    }
    
    
    

    // public function assignReviewers(Request $request)
    // {
    //     $projectId = $request->input('project_id');
    //     $reviewerIds = $request->input('reviewer_ids', []);

    //     $project = ProjectsModel::find($projectId);
    //     $project->reviewers()->sync($reviewerIds); // Sync to update the relationship
    //     ReviewModel::create($requestData);

    //     return redirect()->route('projects.show', ['id' => $projectId])->with('success', 'Reviewers assigned successfully.');
    // }

    // public function selectReviewers()
    // {
    //     $projectId = 1; // You need to set the project ID here
    //     $reviewers = User::where('role', 4)->get();

    //     return view('submission-details.show', compact('projectId', 'reviewers'));
    // }
    
        
    // public function selectReviewers()
    // {
    //     // $reviewersList = UsersModel::where('role', 4)->get();
    //     // return view('submission-details.show', compact('reviewersList'));

    //     // Assign Reviewers to Projects
    //     $project = ProjectsModel::find($projectId);
    //     $project->reviewers()->attach($reviewerIds); // $reviewerIds is an array of reviewer IDs

    // }
    

    // public function storeReviewer(Request $request)
    // {
    //     // $validatedData = $request->validate([
    //     //     'reviewers' => 'required|array',
    //     //     'reviewers.*' => 'exists:users,id',
    //     // ]);
    
    //     // $projectId = 1; 
    //     // $project = ProjectsModel::findOrFail($projectId);
    //     // $filteredReviewers = User::whereIn('id', $validatedData['reviewers'])
    //     //     ->where('role', 4)
    //     //     ->pluck('id');
    
    //     // $project->reviewers()->attach($filteredReviewers);
    //     // $reviewersList = User::where('role', 4)->get();
    
    //     // return view('submission-details.show', compact('reviewersList'));

    //     $review = new Review([
    //         'content' => 'Review content here',
    //         // ... other review attributes
    //     ]);
        
    //     $reviewer = User::find($reviewerId);
    //     $project = Project::find($projectId);
        
    //     $project->reviews()->save($review);
    //     $reviewer->reviews()->save($review);
        
    // }
    
    public function func()
    {
        // Retrieve reviews for a project:
        $project = ProjectsModel::find($projectId);
        $reviews = $project->reviews;

        // Retrieve projects a reviewer has reviewed:
        $reviewer = UsersModel::find($reviewerId);
        $reviewedProjects = $reviewer->reviewedProjects;

        // Create a new review for a project by a reviewer:
        $project = ProjectsModel::find($projectId);
        $reviewer = UsersModel::find($reviewerId);

        $review = new ReviewModel([
            'rating' => $rating,
            'comment' => $comment,
        ]);

        $project->reviews()->save($review, ['user_id' => $reviewer->id]);


    }

}
