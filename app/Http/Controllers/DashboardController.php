<?php

namespace App\Http\Controllers;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function countAll()
    {
        $authenticatedUserId = auth()->user()->id;
        $allUsersCount = UsersModel::count();
        $allProjectsCount = ProjectsModel::count();
        $allUnderEvaluationCount = ProjectsModel::where('status', 'Under Evaluation')->count();
        $allForRevisionCount = ProjectsModel::where('status', 'For Revision')->count();
        $allApprovedCount = ProjectsModel::where('status', 'Approved')->count();
        $allDeferredCount = ProjectsModel::where('status', 'Deferred')->count();
        $allDisapprovedCount = ProjectsModel::where('status', 'Disapproved')->count();
        $projectCount = ProjectsModel::where('user_id', $authenticatedUserId)->count();
        $draftCount = ProjectsModel::where('status', 'Draft')->where('user_id', $authenticatedUserId)->count();
        $underEvaluationCount = ProjectsModel::where('status', 'Under Evaluation')->where('user_id', $authenticatedUserId)->count();
        $forRevisionCount = ProjectsModel::where('status', 'For Revision')->where('user_id', $authenticatedUserId)->count();
        $approvedCount = ProjectsModel::where('status', 'Approved')->where('user_id', $authenticatedUserId)->count();
        $deferredCount = ProjectsModel::where('status', 'Deferred')->where('user_id', $authenticatedUserId)->count();
        $disapprovedCount = ProjectsModel::where('status', 'Disapproved')->where('user_id', $authenticatedUserId)->count();

        $deadlines = ReviewModel::all();
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
        

        return view('dashboard', compact('allDisapprovedCount','allDeferredCount','allApprovedCount','allForRevisionCount','allUnderEvaluationCount','allUsersCount','allProjectsCount','projectCount','draftCount','underEvaluationCount','underEvaluationCount',
                                'forRevisionCount','approvedCount','deferredCount','disapprovedCount','exceededDeadlines','countOfUnreviewedProjects',
                                'assignedAndReviewedCount','countOfReviewsWithTwoComments'));
    }
}
