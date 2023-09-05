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
    public function selectReviewers(ProjectsModel $project)
    {
        // Assuming you have the $role4Users variable as well
        $roleUsers = UsersModel::where('role', 4)->get(); // Retrieve users with role 4

        return view('submission-details.reviews.select-reviewer', compact('project', 'roleUsers'));
    }

public function store(Request $request)
{
    $projectId = $request->input('project_id');
    $reviewerIds = $request->input('reviewer_ids');

    foreach ($reviewerIds as $reviewerId) {
        // Create a new review instance with the provided data
        ReviewModel::create([
            'project_id' => $projectId,
            'user_id' => $reviewerId,
            'highlighted_text' => 'highlighted text here',
            'comment' => 'pending', // Default value
        ]);
    }

    return redirect()->back()->with('success', 'Reviewers assigned successfully.');
}

    public function showForm()
    {
        $projects = Project::all(); // Retrieve a list of projects

        // Assuming you have the $role4Users variable as well
        $role4Users = User::where('role', 4)->get(); // Retrieve users with role 4

        return view('submission-details.reviews.select-reviewer', compact('projects', 'role4Users'));
    }
    public function select()
    {
        // $project = Project::findOrFail($project_id);
        return view('submission-details.reviews.select-reviewer');
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
