<?php

namespace App\Http\Controllers;
use App\Notifications\ProjectNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\User;
use App\Models\ProjectReviewerModel;
use App\Models\ProjectTeamModel;
use App\Models\LineItemBudgetModel;
use App\Models\ProjectFileModel;
use App\Models\ProjectHistory;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects = ProjectsModel::all();
        $reviewers = User::whereIn('id', ProjectReviewerModel::pluck('user_id'))->get();
    
        return view('projects.index', compact('projects', 'reviewers'));
    }


    public function create()
    {
        $project = new ProjectsModel();

        $users = User::all();

        // Notification::send($users, new ProjectNotification($project->id));

        return view('projects.create');
    }

    public function store(Request $request)
    {
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
        $userId = Auth::id();

        $projects = new ProjectsModel;
        $projects->projname = $request->projname;
        $projects->status = 'under evaluation';
        $projects->user_id = $userId;
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
        $teamMembers = ProjectTeamModel::where('project_id', $id)->get();
        $lineItems = LineItemBudgetModel::where('project_id', $id)->get();
        $files = ProjectFileModel::where('project_id', $id)->get();
        // $records = ProjectsModel::findOrFail($id);
        $records = ProjectsModel::with('user')->findOrFail($id);
        $reviewers = User::whereIn('id', ProjectReviewerModel::pluck('user_id'))->get();

        return view('submission-details.show', compact('records', 'reviewers', 'teamMembers', 'lineItems', 'files'));

    }
    
    
    public function edit($id)
    {
        $reviewers = UsersModel::where('role', 4)->get();
        $projects = ProjectsModel::findOrFail($id);
        $projectTeam = ProjectTeamModel::findOrFail($id);

        return view('projects.edit', compact('projects', 'reviewers', 'projectTeam'));
    }

    public function update(Request $request, $id)
    {
        $project = ProjectsModel::findOrFail($id);
        $project->status = $request->input('status');
        $project->save();
        // return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
    }



    public function destroy($id)
    {
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();
        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }



}
