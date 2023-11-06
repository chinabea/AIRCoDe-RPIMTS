<?php

namespace App\Http\Controllers;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CallForProposal;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Ulid\Ulid;
// use rorecek\Ulid\Ulid;


class DashboardController extends Controller
{
    public function countAll()
    {
        try {
            $authenticatedUserId = auth()->user()->id;
            $records = CallForProposal::orderBy('created_at', 'ASC')->get();
            $allUsersCount = User::count();
            $allProjectsCount = Project::count();
            $allUnderEvaluationCount = Project::where('status', 'Under Evaluation')->count();
            $allForRevisionCount = Project::where('status', 'For Revision')->count();
            $allApprovedCount = Project::where('status', 'Approved')->count();
            $allDeferredCount = Project::where('status', 'Deferred')->count();
            $allDisapprovedCount = Project::where('status', 'Disapproved')->count();
            $projectCount = Project::where('user_id', $authenticatedUserId)->count();
            $draftCount = Project::where('status', 'Draft')->where('user_id', $authenticatedUserId)->count();
            $underEvaluationCount = Project::where('status', 'Under Evaluation')->where('user_id', $authenticatedUserId)->count();
            $forRevisionCount = Project::where('status', 'For Revision')->where('user_id', $authenticatedUserId)->count();
            $approvedCount = Project::where('status', 'Approved')->where('user_id', $authenticatedUserId)->count();
            $deferredCount = Project::where('status', 'Deferred')->where('user_id', $authenticatedUserId)->count();
            $disapprovedCount = Project::where('status', 'Disapproved')->where('user_id', $authenticatedUserId)->count();

            $deadlines = Review::all();
            $exceededDeadlines = $deadlines->filter(function ($deadline) use ($authenticatedUserId) {
                return $deadline->deadlineExceeded() && empty($deadline->contribution_to_knowledge) && $deadline->user_id === $authenticatedUserId;
            });

            $countOfUnreviewedProjects = $exceededDeadlines->count();
            $assignedAndReviewedCount = $deadlines->filter(function ($deadline) use ($authenticatedUserId) {
                return !empty($deadline->contribution_to_knowledge) && $deadline->user_id === $authenticatedUserId;
            })->count();
            
            $staffForReview = $deadlines->filter(function ($deadline) {
                // Split the contribution_to_knowledge by a comma and count the elements
                $deadline->project_id && $comments = explode(',', $deadline->contribution_to_knowledge);
                // Remove any empty comments
                $comments = array_filter($comments);
                return count($comments) === 1;
            });

            $projectCommentsCount = [];
            $staffForReview = $deadlines->filter(function ($deadline) use (&$projectCommentsCount) {
                $projectID = $deadline->project_id;
                $comments = explode(',', $deadline->contribution_to_knowledge);
                // Remove any empty comments
                $comments = array_filter($comments);

                // Track the comment count for each project
                if (!isset($projectCommentsCount[$projectID])) {
                    $projectCommentsCount[$projectID] = 0;
                }

                $projectCommentsCount[$projectID] += count($comments);

                // Keep only the deadlines where the project has more than one comment
                return $projectCommentsCount[$projectID] > 1;
            });

            $countOfReviewsWithTwoComments = $staffForReview->count();
            

            return view('dashboard', compact('records','allDisapprovedCount','allDeferredCount','allApprovedCount','allForRevisionCount','allUnderEvaluationCount','allUsersCount','allProjectsCount','projectCount','draftCount','underEvaluationCount','underEvaluationCount',
                                    'forRevisionCount','approvedCount','deferredCount','disapprovedCount','exceededDeadlines','countOfUnreviewedProjects',
                                    'assignedAndReviewedCount','countOfReviewsWithTwoComments'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while counting data: ' . $e->getMessage());
        }
    }

    public function viewCallforProposals()
    {
        try {
            // Fetch all records from the model and pass them to the view
            // $items = CallForProposal::all();
            $records = CallForProposal::orderBy('created_at', 'ASC')->get();

            return view('dashboard', compact('records'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while viewing Call for Proposals: ' . $e->getMessage());
        }

    }
    
}
