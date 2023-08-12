<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;
use App\Models\ProjectsModel;

class ReviewerController extends Controller
{
    
    public function selectReviewers()
    {
        $reviewersList = UsersModel::where('role', 4)->get();
        return view('submission-details.show', compact('reviewersList'));
    }
    

    public function storeReviewer(Request $request)
    {
        $validatedData = $request->validate([
            'reviewers' => 'required|array',
            'reviewers.*' => 'exists:users,id',
        ]);
    
        $projectId = 1; 
        $project = ProjectsModel::findOrFail($projectId);
        $filteredReviewers = User::whereIn('id', $validatedData['reviewers'])
            ->where('role', 4)
            ->pluck('id');
    
        $project->reviewers()->attach($filteredReviewers);
        $reviewersList = User::where('role', 4)->get();
    
        return view('submission-details.show', compact('reviewersList'));
    }
    
    
}
