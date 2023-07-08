<?php

namespace App\Http\Controllers;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\User;

class ProjectsController extends Controller
{
    public function selectReviewers()
    {
    $users = UsersModel::where('role', 4)->get();

    return view('proponents.projects.reviewer', compact('users'));
    }

    public function index()
    {

        $records = ProjectsModel::orderBy('created_at', 'ASC')->get();
        $reviewers = UsersModel::where('role', 4)->get(); // Fetch users with role = 4 (assuming 4 represents reviewers)
        $users = UsersModel::all(); // Fetch all users

        return view('proponents.projects.index', compact('records', 'reviewers', 'users'));
    }


    public function create()
    {
        // Create the project instance
        $project = new ProjectsModel(); // Replace with your project creation logic
    
        // Create an array of user instances to receive the notification
        $users = User::all(); // Replace with your user retrieval logic
    
        // Send email notification
        Notification::send($users, new ProjectNotification($project->id));

    
        // Return response
        return view('proponents.projects.create');
    }

    public function store(Request $request)
    {
        $selectedReviewers = $request->input('reviewers');

        $request->validate([
                'projname' => 'required',
                'researchgroup' => 'required',
                'authors' => 'required',
                'introduction' => 'required',
                'aims_and_objectives' => 'required',
                'background' => 'required',
                'expected_research_contribution' => 'required',
                'proposed_methodology' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'workplan' => 'required',
                'resources' => 'required',
                'references' => 'required',
        ]);

        $projects = new ProjectsModel;
        $projects->projname = $request->projname;
        $projects->status = 'under evaluation';
        $projects->researchgroup = $request->researchgroup;
        $projects->authors = $request->authors;
        $projects->introduction = $request->introduction;
        $projects->aims_and_objectives = $request->aims_and_objectives;
        $projects->background = $request->background;
        $projects->expected_research_contribution = $request->expected_research_contribution;
        $projects->proposed_methodology = $request->proposed_methodology;
        $projects->start_date = $request->start_date;
        $projects->end_date = $request->end_date;
        $projects->workplan = $request->workplan;
        $projects->resources = $request->resources;
        $projects->references = $request->references;
        $projects->save();

        return redirect()->route('projects')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        $projects = ProjectsModel::findOrFail($id);


        return view('proponents.projects.show', compact('projects'));
    }

    public function edit($id)
    {
        $projects = ProjectsModel::findOrFail($id);

        return view('proponents.projects.edit', compact('projects'));
    }

    public function update(Request $request, $id)
    {
        $projects = ProjectsModel::findOrFail($id);
        $projects->update($request->all());

        return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();

        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }
}
