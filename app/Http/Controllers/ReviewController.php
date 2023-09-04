<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReviewDecisionModel;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\ReviewModel;

class ReviewController extends Controller
{

    // public function assignReviewers(Request $request, $projectId)
    // {
    //     $projId = $request->input('project_id');
    //     $requestData = $request->all();
    //     $requestData['project_id'] = $projId;
    //     $reviewerRoleId = 4; // Replace with the actual role ID of reviewers

    //     // Retrieve users with the specified role
    //     $reviewers = UsersModel::where('role', $reviewerRoleId)->get();

    //     // Find the project
    //     $project = ProjectsModel::findOrFail($projectId);

    //     // Assign selected reviewers to the project without detaching existing reviewers
    //     $selectedReviewers = UsersModel::whereIn('id', $request->input('reviewer_ids'))->get();
    //     $project->reviewers()->syncWithoutDetaching($selectedReviewers);

    //     return redirect()->back()->with('success', 'Reviewers have been assigned to the project.');
    // }
    // public function selectReviewers(Request $request) {
    //     $selectedReviewers = $request->input('reviewers');
    
    //     $projId = $request->input('project_id', 1);
    //     $requestData = $request->all();
    //     $requestData['project_id'] = $projId;

    //     // Attach the selected reviewers to the project using relationships
    //     foreach ($selectedReviewers as $reviewerId) {
    //         $project->reviewers()->attach($reviewerId);
    //     }
    
    //     // Alternatively, you can store the selected reviewers' IDs in the session
    //     // or database to be used later in the finalization step
    
    //     return redirect()->route('selectReviewers')->with('success', 'Reviewers selected successfully.');
    // }

    public function select()
    {
        // $project = Project::findOrFail($project_id);
        return view('submission-details.reviews.select-reviewer');
    }
    
    // public function selectReviewers(Request $request, $projectId)
    // {
    //     $reviewId = $request->input('project_id');
    //     $requestData = $request->all();
    //     $requestData['project_id'] = $reviewId;
    //     ReviewModel::create($requestData);

    //     // $project = ProjectsModel::findOrFail($projectId);
    //     $reviewers = UsersModel::where('role', 4)->get();
        
    //     if ($request->isMethod('post')) {
    //         $selectedReviewers = $request->input('reviewer_ids');
            
    //         foreach ($selectedReviewers as $reviewerId) {
    //             $project->reviewers()->attach($reviewerId);
    //         }
    
    //         return redirect()->route('submission-details.reviews.assignReviewers', ['projectId' => $projectId])
    //             ->with('success', 'Reviewers assigned successfully.');
    //     }
    
    //     return view('submission-details.reviews.select_reviewers', compact('project', 'reviewers'));
    // }

    public function selectReviewers(Request $request, $projectId)
    {
        // Validate the request data, if necessary

        // Fetch all reviewers with role 4
        $reviewers = UsersModel::where('role', 4)->get();

        // Create a new review record
        $review = new ReviewModel();
        $review->project_id = $projectId; // Assuming you have a project_id column in your Review model
        $review->save();

        // Fetch the project (assuming you have a Project model)
        $project = ProjectsModel::findOrFail($projectId);

        if ($request->isMethod('post')) {
            // Get the selected reviewer IDs from the form
            $selectedReviewers = $request->input('reviewer_ids');

            // Attach selected reviewers to the project
            $project->reviewers()->sync($selectedReviewers);

            return redirect()->route('submission-details.reviews.assignReviewers', ['projectId' => $projectId])
                ->with('success', 'Reviewers assigned successfully.');
        }

        return view('submission-details.reviews.select_reviewers', compact('project', 'reviewers'));
    }

    public function assignReviewers(Request $request, $projectId)
    {
        // Retrieve the selected reviewer IDs from the form
        $selectedReviewerIds = $request->input('reviewer_ids', []);

        // Find the project
        $project = ProjectsModel::findOrFail($projectId);

        // Attach selected reviewers to the project without detaching existing reviewers
        $project->reviewers()->syncWithoutDetaching($selectedReviewerIds);

        return redirect()->back()->with('success', 'Reviewers have been assigned to the project.');
    }


    // public function review($id)
    // {
    //     $records = ProjectsModel::findOrFail($id);

    //     return view('reviews.review-decision', compact('records'));
    // }

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

    public function comments(Request $request, $data_id)
    {
        // Retrieve data based on the $data_id
        $data = ProjectsModel::findOrFail($data_id);

        // // Validate the request
        // $request->validate([
        //     'highlighted_text' => 'required|string',
        //     'comment' => 'required|string',
        // ]);

        // // Create a new review
        // $review = new ReviewModel([
        //     'user_id' => Auth::id(),
        //     'project_id' => $data_id,
        //     'highlighted_text' => $request->input('highlighted_text'),
        //     'comment' => $request->input('comment'),
        // ]);
        // $review->save();


        return view('submission-details.reviews.rsc', ['data' => $data]);
    }




































    // public function addReview(Request $request, $data_id)
    // {
    //     $data = ProjectsModel::findOrFail($data_id);

    //     $this->validate($request, [
    //         'highlighted_text' => 'required',
    //         'review_text' => 'required',
    //     ]);

    //     // Create a new review and associate it with the project
    //     $review = new ReviewModel([
    //         'highlighted_text' => $request->input('highlighted_text'),
    //         'review_text' => $request->input('review_text'),
    //     ]);

    //     $data->reviews()->save($review);

    //     return redirect()->back()->with('success', 'Review added successfully.');
    // }


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
