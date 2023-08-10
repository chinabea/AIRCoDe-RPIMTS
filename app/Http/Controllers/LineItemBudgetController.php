<?php

namespace App\Http\Controllers;

use App\Models\LineItemBudgetModel;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class LineItemBudgetController extends Controller
{
    public function index()
    {
        $teamMembers = ProjectTeamModel::all();
        return view('submission-details.project-teams.index', compact('teamMembers'));
    }

    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('submission-details.project-teams.create', compact('project'));
    }

    public function store(Request $request)
    {
        $projectId = $request->input('project_id');
        $requestData = $request->all();
        $requestData['project_id'] = $projectId;
        ProjectTeamModel::create($requestData);

        return redirect()->back()->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        $teamMembers = ProjectTeamModel::findOrFail($id);
        return view('submission-details.project-teams.show', compact('teamMembers'));
    }

    public function edit($id)
    {
        $projectTeam = ProjectTeamModel::where('id', $id)->firstOrFail();
        $projects = $projectTeam->project;
        return view('submission-details.project-teams.edit', compact('projectTeam', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $projectTeam = ProjectTeamModel::find($id);
        $projectTeam->member_name = $request->input('member_name');
        $projectTeam->role = $request->input('role');
        $projectTeam->save();

        return redirect()->back()->with('success', 'Project team member updated successfully.');
    }

    public function destroy($id)
    {
        $projectTeam = ProjectTeamModel::findOrFail($id);
        $projectTeam->delete();
        return redirect()->back()->with('success', 'Project team member deleted successfully');
    }
}
