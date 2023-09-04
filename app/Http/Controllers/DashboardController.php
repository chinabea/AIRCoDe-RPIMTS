<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countAll()
    {
        $allUsersCount = UsersModel::count();
        $allProjectsCount = ProjectsModel::count();
        $draftCount = ProjectsModel::where('status', 'Draft')->count();
        $underEvaluationCount = ProjectsModel::where('status', 'Under Evaluation')->count();
        $forRevisionCount = ProjectsModel::where('status', 'For Revision')->count();
        $approvedCount = ProjectsModel::where('status', 'Approved')->count();
        $deferredCount = ProjectsModel::where('status', 'Deferred')->count();
        $disapprovedCount = ProjectsModel::where('status', 'Disapproved')->count();
        
        return view('dashboard', compact('allUsersCount','allProjectsCount','draftCount','underEvaluationCount','underEvaluationCount','forRevisionCount',
                    'approvedCount','deferredCount','disapprovedCount'));
    }
}
