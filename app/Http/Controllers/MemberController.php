<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\ProjectsModel;

class MemberController extends Controller
{
    public function index()
    {
        $teamMembers = Member::all();
        return view('submission-details.project-teams.index', compact('teamMembers'));
    }

    public function create()
    {
        // $project = Project::findOrFail($project_id);
        return view('submission-details.project-teams.create');
    }

    public function store(Request $request)
    {
        $projectId = $request->input('project_id');
        $requestData = $request->all();
        $requestData['project_id'] = $projectId;
        Member::create($requestData);

        return redirect()->back()->with('success', 'Team Member Successfully Added!');
    }

    public function show($id)
    {
        $teamMembers = Member::findOrFail($id);
        return view('submission-details.project-teams.show', compact('teamMembers'));
    }

    public function edit($id)
    {
        $projectTeam = Member::where('id', $id)->firstOrFail();
        $projects = $projectTeam->project;
        return view('submission-details.project-teams.edit', compact('projectTeam', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $projectTeam = Member::find($id);
        $projectTeam->member_name = $request->input('member_name');
        $projectTeam->role = $request->input('role');
        $projectTeam->save();

        return redirect()->back()->with('success', 'Project team member updated successfully.');
    }

    public function destroy($id)
    {
        $projectTeam = Member::findOrFail($id);
        $projectTeam->delete();
        return redirect()->back()->with('success', 'Project team member deleted successfully');
    }

}
