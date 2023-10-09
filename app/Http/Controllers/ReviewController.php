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
    public function store(Request $request)
    {
    
    // dd($request->all());
    $projectId = $request->input('project_id');
    $reviewerIds = $request->input('reviewer_ids');
    $individualDeadlines = $request->input('individual_deadlines');
    $userId = Auth::id();
    $existingReviewers = ReviewModel::where('project_id', $projectId)->pluck('user_id')->toArray();

    // Set a single deadline for all reviewers
    $deadline = $request->input('deadline');

        foreach ($reviewerIds as $reviewerId) {
            // Check if the reviewer is already assigned to the project
            if (in_array($reviewerId, $existingReviewers)) {
                // Display a message that this reviewer is already assigned to review this project
                return redirect()->route('submission-details.show', ['id' => $projectId])->with('error', 'Reviewer Already Assigned!');
            } 
                
        $newReview = ReviewModel::create([
            'project_id' => $projectId,
            'user_id' => $reviewerId,
            'deadline' => $deadline,
            'project_name' => $request->input('project_name') ?? null,
            'research_group' => $request->input('research_group') ?? null,
            'project_authors' => $request->input('project_authors') ?? null,
            'project_introduction' => $request->input('project_introduction') ?? null,
            'project_aims_and_objectives' => $request->input('project_aims_and_objectives') ?? null,
            'project_background' => $request->input('project_background') ?? null,
            'research_contribution' => $request->input('research_contribution') ?? null,
            'project_methodology' => $request->input('project_methodology') ?? null,
            'project_start_date' => $request->input('project_start_date') ?? null,
            'project_end_date' => $request->input('project_end_date') ?? null,
            'project_workplan' => $request->input('project_workplan') ?? null,
            'project_resources' => $request->input('project_resources') ?? null,
            'project_references' => $request->input('project_references') ?? null,
            'project_total_budget' => $request->input('project_total_budget') ?? null,
            'other_rsc' => $request->input('other_rsc') ?? null,
        ]);
        
        }
        return redirect()->route('submission-details.show', ['id' => $projectId]);
    }

    public function storeComments(Request $request, $id)
    {
        $userId = Auth::id();

        // Retrieve the project ID(s) that the authenticated user is set to review
        $reviewedProjectIds = ReviewModel::where('user_id', $userId)->pluck('project_id');
        // $reviewerId = $project->reviewer_id;
        
        // Check if the user is allowed to review the specified project
        if ($reviewedProjectIds->contains($id)) {
            // Retrieve the existing review record based on project ID and user ID
            $existingReview = ReviewModel::where('project_id', $id)
            ->where('user_id', $userId)
            ->first();
    
            if ($existingReview) {
                // Update only the null fields with the values from the request
                $existingReview->project_name = $existingReview->project_name ?? $request->input('project_name');
                $existingReview->research_group = $existingReview->research_group ?? $request->input('research_group');
                $existingReview->project_authors = $existingReview->project_authors ?? $request->input('project_authors');
                $existingReview->project_introduction = $existingReview->project_introduction ?? $request->input('project_introduction');
                $existingReview->project_aims_and_objectives = $existingReview->project_aims_and_objectives ?? $request->input('project_aims_and_objectives');
                $existingReview->project_background = $existingReview->project_background ?? $request->input('project_background');
                $existingReview->research_contribution = $existingReview->research_contribution ?? $request->input('research_contribution');
                $existingReview->project_methodology = $existingReview->project_methodology ?? $request->input('project_methodology');
                $existingReview->project_start_date = $existingReview->project_start_date ?? $request->input('project_start_date');
                $existingReview->project_end_date = $existingReview->project_end_date ?? $request->input('project_end_date');
                $existingReview->project_workplan = $existingReview->project_workplan ?? $request->input('project_workplan');
                $existingReview->project_resources = $existingReview->project_resources ?? $request->input('project_resources');
                $existingReview->project_references = $existingReview->project_references ?? $request->input('project_references');
                $existingReview->project_total_budget = $existingReview->project_total_budget ?? $request->input('project_total_budget');
                $existingReview->other_rsc = $existingReview->other_rsc ?? $request->input('other_rsc');
        
                $existingReview->save();
            }       
        }
        
        return redirect()->route('reviewer.home');
    }

    public function storeSummaryReview(Request $request)
    {
        // $records = ProjectsModel::findOrFail($id);
        // dd($request->all());
        $userId = Auth::id();
        $validatedData = $request->validate([
            'project_id' => 'required', // Add any other validation rules as needed
        ]);
        $projectId = $request->input('project_id');
    
        // Check if the user has already commented on the project
        $existingComment = ReviewModel::where('user_id', $userId)
            ->where('project_id', $projectId)
            ->first();
    
        if ($existingComment) {
            return redirect()
                ->route('submission-details.show', ['id' => $projectId])
                ->with('error', 'You have already summarized comments on this project.');
        }
        else {
            $summary = ReviewModel::create([
             'project_id' => $projectId,
             'user_id' => $userId,
             'deadline' => $request->input('deadline') ?? null,
             'project_name' => $request->input('project_name') ?? null,
             'research_group' => $request->input('research_group') ?? null,
             'project_authors' => $request->input('project_authors') ?? null,
             'project_introduction' => $request->input('project_introduction') ?? null,
             'project_aims_and_objectives' => $request->input('project_aims_and_objectives') ?? null,
             'project_background' => $request->input('project_background') ?? null,
             'research_contribution' => $request->input('research_contribution') ?? null,
             'project_methodology' => $request->input('project_methodology') ?? null,
             'project_start_date' => $request->input('project_start_date') ?? null,
             'project_end_date' => $request->input('project_end_date') ?? null,
             'project_workplan' => $request->input('project_workplan') ?? null,
             'project_resources' => $request->input('project_resources') ?? null,
             'project_references' => $request->input('project_references') ?? null,
             'project_total_budget' => $request->input('project_total_budget') ?? null,
             'other_rsc' => $request->input('other_rsc') ?? null,
             'actions' => $request->input('actions') ?? null,
         ]); 
        }   
        
        return redirect()->route('staff.home');
    }

    // public function showForm()
    // {
    //     $projects = Project::all(); // Retrieve a list of projects

    //     // Assuming you have the $role4Users variable as well
    //     $role4Users = User::where('role', 4)->get(); // Retrieve users with role 4

    //     return view('submission-details.reviews.select-reviewer', compact('projects', 'role4Users'));
    // }
    // public function select()
    // {
    //     // $project = Project::findOrFail($project_id);
    //     return view('submission-details.reviews.select-reviewer');
    // }
    

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
        $toreview = ReviewModel::where('project_id', $id)->get()->first();
        $members = UsersModel::where('role', 3)->get();
        return view('submission-details.show', compact('records','toreview','members'));
    }


    // // functional na
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
        return redirect()->route('submission-details.show', ['id' => $id]);
    }

    
//     public function reviewDecision(Request $request, $id)
//     {
//     $request->validate([
//         'decision' => 'required|in:Accepted,Accepted with Revision,Rejected',
//     ]);

//     // Assuming you have a ReviewModel (or similar) to represent reviews
//     $reviewsWithoutDeadline = ReviewModel::where('user_id', 2) // Remove the comma here
//         ->where('project_id', $id)
//         ->whereNull('deadline') // Add this line to filter reviews without a deadline
//         ->get(); // Use get() to retrieve a collection of matching reviews

//     if ($reviewsWithoutDeadline->isEmpty()) {
//         return redirect()->back()->with('error', 'No reviews without a deadline found.');
//     }

//     // Initialize an array to store review IDs
//     $reviewIds = [];

//     // Update the decision for each review individually
//     foreach ($reviewsWithoutDeadline as $review) {
//         $review->decision = $request->input('decision');
//         $review->save();

//         // Add the review ID to the array
//         $reviewIds[] = $review->id;
//     }

//     // Now, $reviewIds contains the IDs of the reviews without a deadline that were updated

//     return redirect()->route('submission-details.show', ['id' => $id]);
// }


    
    

    public function comments(Request $request, $data_id)
    {
        // Retrieve data based on the $data_id
        $data = ProjectsModel::findOrFail($data_id);

        $request->validate([
            'actions' => 'required|in:In Progress,Accomplished',
        ]);

        $project = ProjectsModel::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        $project->actions = $request->input('actions');
        $project->save();

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
