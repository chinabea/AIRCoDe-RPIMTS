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
        $projectCount = ProjectsModel::where('user_id', $authenticatedUserId)->count();
        $draftCount = ProjectsModel::where('status', 'Draft')->where('user_id', $authenticatedUserId)->count();
        $underEvaluationCount = ProjectsModel::where('status', 'Under Evaluation')->where('user_id', $authenticatedUserId)->count();
        $forRevisionCount = ProjectsModel::where('status', 'For Revision')->where('user_id', $authenticatedUserId)->count();
        $approvedCount = ProjectsModel::where('status', 'Approved')->where('user_id', $authenticatedUserId)->count();
        $deferredCount = ProjectsModel::where('status', 'Deferred')->where('user_id', $authenticatedUserId)->count();
        $disapprovedCount = ProjectsModel::where('status', 'Disapproved')->where('user_id', $authenticatedUserId)->count();

        $reviews = ReviewModel::all();
        
        $currentDate = now(); // Get the current date and time

        $deadlines = ReviewModel::where('deadline', '<', $currentDate)
            ->whereNull('contribution_to_knowledge')
            ->whereNotIn('user_id', function ($subQuery) {
                $subQuery->select('user_id')
                    ->from('reviews')
                    ->whereNotNull('project_id');
            })
            ->get();

           
        return view('dashboard', compact('allUsersCount','allProjectsCount','projectCount','draftCount','underEvaluationCount','underEvaluationCount','forRevisionCount',
                    'approvedCount','deferredCount','disapprovedCount','reviews','deadlines'));
    }


    // public function showDeadlines() {
    //     $deadlines = ReviewModel::all();
    //     return view('dashboard', compact('deadlines'));
    // }
    
    

}
