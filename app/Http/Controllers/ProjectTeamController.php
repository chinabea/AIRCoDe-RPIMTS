<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTeamModel;
use App\Models\ProjectsModel;

class ProjectTeamController extends Controller
{
    public function index()
    {
        $teamMembers = ProjectTeamModel::all();
        return view('submission-details.project-teams.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('submission-details.project-teams.create');
    }

    public function store(Request $request)
    {
        $projectId = $request->input('project_id', 1);
        $requestData = $request->all();
        // dd($request->all());
        $requestData['project_id'] = $projectId;

        ProjectTeamModel::create($requestData);

        // Redirect or perform other actions
        return redirect()->route('submission-details.show')->with('success', 'Data Successfully Added!');
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
        // Find the project team member by their ID
        $projectTeam = ProjectTeamModel::find($id);

        // Update the member name and role based on the form input
        $projectTeam->member_name = $request->input('member_name');
        $projectTeam->role = $request->input('role');

        // Save the updated project team member
        $projectTeam->save();

        // Redirect the user or perform other actions as needed
        return redirect()->back()->with('success', 'Project team member updated successfully.');
    }

    public function destroy($id)
    {
        $projectTeam = ProjectTeamModel::findOrFail($id);
        $projectTeam->delete();

        return redirect()->route('submission-details.show')->with('success', 'Project team member deleted successfully');
    }

}
