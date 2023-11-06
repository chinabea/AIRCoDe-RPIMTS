<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\ProjectsModel;

class MemberController extends Controller
{

    public function index()
    {
        try {
            $teamMembers = Member::all();
            return view('submission-details.project-teams.index', compact('teamMembers'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching project team members: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            // $project = Project::findOrFail($project_id);
            return view('submission-details.project-teams.create');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating a new team member: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $projectId = $request->input('project_id');
            $requestData = $request->all();
            $requestData['project_id'] = $projectId;

            // Define validation rules
            $rules = [
                'member_name' => 'required',
                'role' => 'required',
            ];

            // Validate the request data using the defined rules
            $this->validate($request, $rules);

            Member::create($requestData);

            return redirect()->back()->with('success', 'Team Member Successfully Added!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding a team member: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $teamMembers = Member::findOrFail($id);
            return view('submission-details.project-teams.show', compact('teamMembers'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while showing team member details: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $projectTeam = Member::where('id', $id)->firstOrFail();
            $projects = $projectTeam->project;
            return view('submission-details.project-teams.edit', compact('projectTeam', 'projects'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while editing a team member: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $projectTeam = Member::find($id);
            $projectTeam->member_name = $request->input('member_name');
            $projectTeam->role = $request->input('role');
            $projectTeam->save();

            return redirect()->back()->with('success', 'Project team member updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating a team member: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $projectTeam = Member::findOrFail($id);
            $projectTeam->delete();
            return redirect()->back()->with('success', 'Project team member deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting a team member: ' . $e->getMessage());
        }
    }


}
