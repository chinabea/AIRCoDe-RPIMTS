<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\ProjectTeamModel;
use App\Models\ProjectsModel;

class ProjectTeamController extends Controller
{
    public function index(ProjectTeamModel $projectTeam)
    {
        $projectTeams = ProjectTeamModel::all();
        return view('submission-details.project-teams.index', compact('projectTeams'));
    }

    public function create()
    {
        return view('submission-details.project-teams.create');
    }

    public function store(Request $request)
    {

        $input = $request->all();
        ProjectTeamModel::create($input);
        return redirect()->back()->with('success', 'your message,here');   
    }

    public function show($id)
    {
        $projectTeam = ProjectTeamModel::findOrFail($id);
        return view('submission-details.project-teams.show', compact('projectTeam'));
    }

    // public function edit($id)
    // {
    //     $projectTeam = ProjectTeamModel::findOrFail($id);
    //     $project = $projectTeam->project;
    //     return view('submission-details.project-teams.edit', compact('projectTeam', 'project'));
    // }

    public function edit(ProjectTeamModel $projectTeam)
    {
        return view('submission-details.project-teams.edit', compact('projectTeam'));
    }
    

    // Update a project team member
    public function update(Request $request, ProjectTeamModel $projectTeam)
    {
        // Validation - Example: you can modify the validation rules based on your needs
        $validatedData = $request->validate([
            'member_name' => 'required|string',
            'role' => 'required|string',
            // Add validation rules for other attributes of the ProjectTeamModel if needed
        ]);

        // Update the attributes of the project team based on the validated data
        $projectTeam->update($validatedData);

        // Redirect back to the edit page with a success message
        return redirect()->route('submission-details.project-teams.edit', ['projectTeam' => $projectTeam->id])
            ->with('success', 'Project team details updated successfully!');
    }

    public function destroy($id)
    {
        $projectTeam = ProjectTeamModel::findOrFail($id);
        $projectTeam->delete();

        return redirect()->route('submission-details.project-teams.index')->with('success', 'Project team member deleted successfully');
    }

}
