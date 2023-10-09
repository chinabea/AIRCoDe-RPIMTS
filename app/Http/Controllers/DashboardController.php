<?php

namespace App\Http\Controllers;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\ProjectsModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;

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
        
        return view('dashboard', compact('allUsersCount','allProjectsCount','projectCount','draftCount','underEvaluationCount','underEvaluationCount','forRevisionCount',
                    'approvedCount','deferredCount','disapprovedCount'));
    }

    // public function notify()
    // {
    //     if (auth()->user()) {
            

        
    //         $userId = User::first();
            
    //         $researcher = UsersModel::find($userId);
    //         // $researcherMail = $researcher->email;
    //         // $projectTitle = $projects->projname;
    //         $director = UsersModel::where('role', true)->first();
    
    //         auth()->user()->notify()(new ProjectNotification($projectId, $researcher, $researcherMail, $projectTitle, $projects));
    //     }
    //     dd('done');


    // }
    
    
    // public function index()
    // {
    //     $notifications = Auth::user()->unreadNotifications;
    //     return view('/home', compact('notifications'));

    //     // return view('notifications', compact('unreadNotifications', 'readNotifications', 'notifications'));
    // }
}
