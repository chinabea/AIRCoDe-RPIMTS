<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ReviewDecisionModel;
use App\Models\Project;
use App\Models\User;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {

    // dd($request->all());
    $projectId = $request->input('project_id');
    $reviewerIds = $request->input('reviewer_ids');
    $individualDeadlines = $request->input('individual_deadlines');
    $userId = Auth::id();
    $existingReviewers = Review::where('project_id', $projectId)->pluck('user_id')->toArray();


    // Define validation rules
    $rules = [
        'project_id' => 'required|exists:projects,id', // Replace 'projects' with your actual project table name
        'reviews' => 'required|array',
        'reviews.*' => 'exists:reviews,user_id', // Replace 'reviewers' with your actual reviewers table name
        'individual_deadlines' => 'array', // Adjust as needed
        'deadline' => ['required', 'date', 'after_or_equal:today'], // Adjust as needed
    ];

    // Define custom error messages
    $messages = [
        'reviews.*.exists' => 'One or more selected reviewers do not exist.', // Custom message for reviewers
        'deadline.required' => 'The deadline field is required.', // Custom message for required deadline
        'deadline.date' => 'The deadline must be a valid date.', // Custom message for date validation
        'deadline.after_or_equal' => 'The deadline must be on or after today.', // Custom message for after_or_equal validation
    ];

    // Set a single deadline for all reviewers
    $deadline = $request->input('deadline');

        foreach ($reviewerIds as $reviewerId) {
            // Check if the reviewer is already assigned to the project
            if (in_array($reviewerId, $existingReviewers)) {
                // Display a message that this reviewer is already assigned to review this project
                return redirect()->route('submission-details.show', ['id' => $projectId])->with('error', 'Reviewer Already Assigned!');
            }

        $newReview = Review::create([
            'project_id' => $projectId,
            'user_id' => $reviewerId,
            'deadline' => $deadline,
            'contribution_to_knowledge' => $request->input('contribution_to_knowledge'),
            'technical_soundness' => $request->input('technical_soundness'),
            'comprehensive_subject_matter' => $request->input('comprehensive_subject_matter'),
            'applicable_and_sufficient_references' => $request->input('applicable_and_sufficient_references'),
            'inappropriate_references' => $request->input('inappropriate_references'),
            'comprehensive_application' => $request->input('comprehensive_application'),
            'grammar_and_presentation' => $request->input('grammar_and_presentation'),
            'assumption_of_reader_knowledge' => $request->input('assumption_of_reader_knowledge'),
            'clear_figures_and_tables' => $request->input('clear_figures_and_tables'),
            'adequate_explanations' => $request->input('adequate_explanations'),
            'technical_or_methodological_errors' => $request->input('technical_or_methodological_errors'),
            'other_comments' => $request->input('other_comments'),
            'review_decision' => $request->input('review_decision'),
        ]);

        }
        return redirect()->route('submission-details.show', ['id' => $projectId])->with('existingReviewers', $existingReviewers);
    }

    public function storeComments(Request $request, $id)
    {
        $userId = Auth::id();

        // Retrieve the project ID(s) that the authenticated user is set to review
        $reviewedProjectIds = Review::where('user_id', $userId)->pluck('project_id');
        // $reviewerId = $project->reviewer_id;

        // Check if the user is allowed to review the specified project
        if ($reviewedProjectIds->contains($id)) {
            // Retrieve the existing review record based on project ID and user ID
            $existingReview = Review::where('project_id', $id)
            ->where('user_id', $userId)
            ->first();

            if ($existingReview) {
                // Update only the null fields with the values from the request
                $existingReview->contribution_to_knowledge = $existingReview->contribution_to_knowledge ?? $request->input('contribution_to_knowledge');
                $existingReview->technical_soundness = $existingReview->technical_soundness ?? $request->input('technical_soundness');
                $existingReview->comprehensive_subject_matter = $existingReview->comprehensive_subject_matter ?? $request->input('comprehensive_subject_matter');
                $existingReview->applicable_and_sufficient_references = $existingReview->applicable_and_sufficient_references ?? $request->input('applicable_and_sufficient_references');
                $existingReview->inappropriate_references = $existingReview->inappropriate_references ?? $request->input('inappropriate_references');
                $existingReview->comprehensive_application = $existingReview->comprehensive_application ?? $request->input('comprehensive_application');
                $existingReview->grammar_and_presentation = $existingReview->grammar_and_presentation ?? $request->input('grammar_and_presentation');
                $existingReview->assumption_of_reader_knowledge = $existingReview->assumption_of_reader_knowledge ?? $request->input('assumption_of_reader_knowledge');
                $existingReview->clear_figures_and_tables = $existingReview->clear_figures_and_tables ?? $request->input('clear_figures_and_tables');
                $existingReview->adequate_explanations = $existingReview->adequate_explanations ?? $request->input('adequate_explanations');
                $existingReview->technical_or_methodological_errors = $existingReview->technical_or_methodological_errors ?? $request->input('technical_or_methodological_errors');
                $existingReview->other_comments = $existingReview->other_comments ?? $request->input('other_comments');
                $existingReview->review_decision = $existingReview->review_decision ?? $request->input('review_decision');


                $existingReview->save();
            }
        }

        return redirect()->route('reviewer.home');
    }

    public function storeSummaryReview(Request $request)
    {
        // $records = Project::findOrFail($id);
        // dd($request->all());
        $userId = Auth::id();
        $validatedData = $request->validate([
            'project_id' => 'required', // Add any other validation rules as needed
        ]);
        $projectId = $request->input('project_id');

        // Check if the user has already commented on the project
        $existingComment = Review::where('user_id', $userId)
            ->where('project_id', $projectId)
            ->first();

        if ($existingComment) {
            return redirect()
                ->route('submission-details.show', ['id' => $projectId])
                ->with('error', 'You have already summarized comments on this project.');
        }
        else {
            $summary = Review::create([
             'project_id' => $projectId,
             'user_id' => $userId,
             'deadline' => $request->input('deadline') ?? null,
             'contribution_to_knowledge' => $request->input('contribution_to_knowledge') ?? null,
             'technical_soundness' => $request->input('technical_soundness') ?? null,
             'comprehensive_subject_matter' => $request->input('comprehensive_subject_matter') ?? null,
             'applicable_and_sufficient_references' => $request->input('applicable_and_sufficient_references') ?? null,
             'inappropriate_references' => $request->input('inappropriate_references') ?? null,
             'comprehensive_application' => $request->input('comprehensive_application') ?? null,
             'grammar_and_presentation' => $request->input('grammar_and_presentation') ?? null,
             'assumption_of_reader_knowledge' => $request->input('assumption_of_reader_knowledge') ?? null,
             'clear_figures_and_tables' => $request->input('clear_figures_and_tables') ?? null,
             'adequate_explanations' => $request->input('adequate_explanations') ?? null,
             'technical_or_methodological_errors' => $request->input('technical_or_methodological_errors') ?? null,
             'other_comments' => $request->input('other_comments') ?? null,
             'review_decision' => $request->input('review_decision') ?? null,
         ]);
        }

        return redirect()->route('staff.home');
    }


    public function assignReviewers(Request $request, $projectId)
    {
        // Retrieve the selected reviewer IDs from the form
        $selectedReviewerIds = $request->input('reviewer_ids', []);

        // Find the project
        $project = Project::findOrFail($projectId);

        // Attach selected reviewers to the project without detaching existing reviewers
        $project->reviewers()->syncWithoutDetaching($selectedReviewerIds);

        return redirect()->back()->with('success', 'Reviewers have been assigned to the project.');
    }

    public function review($id)
    {
        $records = Project::findOrFail($id);
        $toreview = Review::where('project_id', $id)->get()->first();
        $members = User::where('role', 3)->get();
        return view('submission-details.show', compact('records','toreview','members'));
    }


    // // functional na
    // public function reviewDecision(Request $request, $id)
    // {
    //     $reviewId = $request->input('review_id', 1);
    //     $requestData = $request->all();
    //     $requestData['review_id'] = $reviewId;
    //     ReviewDecisionModel::create($requestData);

    //     $request->validate([
    //         'decision' => 'required|in:Accepted,Accepted with Revision,Rejected',
    //     ]);

    //     $review = ReviewDecisionModel::find($id);
    //     if (!$review) {
    //         return redirect()->back()->with('error', 'Project not found.');
    //     }

    //     $review->decision = $request->input('decision');
    //     $review->save();
    //     return redirect()->route('submission-details.show', ['id' => $id]);
    // }


    // public function comments(Request $request, $data_id)
    // {
    //     // Retrieve data based on the $data_id
    //     $data = Project::findOrFail($data_id);

    //     $request->validate([
    //         'actions' => 'required|in:In Progress,Accomplished',
    //     ]);

    //     $project = Project::find($id);
    //     if (!$project) {
    //         return redirect()->back()->with('error', 'Project not found.');
    //     }

    //     $project->actions = $request->input('actions');
    //     $project->save();

    //     return view('submission-details.reviews.rsc', ['data' => $data]);
    // }





}
