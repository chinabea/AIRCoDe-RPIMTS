<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectTeamModel;
use App\Models\ProjectsModel;

class ProjectTeamController extends Controller
{

    public function index()
    {
        $team = ProjectTeamModel::orderBy('created_at', 'ASC')->get();

        return view('proponents.projects.approved-projects.index', compact('team'));
    }
    
    public function create()
    {
        $project_team = new ProjectTeamModel(); 
        return view('proponents.projects.approved-projects.create');
    }

    // public function store(Request $request)
    // {
    //     ProjectTeamModel::create($request->all());
    
    //     return redirect()->route('proponents.projects.approved-projects.create')->with('success', 'Data Successfully Added!');
    // }

    public function store(Request $request)
    {
        
        // Get the project ID from the request or any other source
        // $projectId = $request->input('project_id');

        $projectId = 1; // Replace with the actual project ID you want to associate the reviewers with
        $project = ProjectsModel::findOrFail($projectId);

        $projectTeam = ProjectTeamModel::create($request->all());
        
        // Associate the project ID with the project team
        $projectTeam->project()->associate($projectId);
        $projectTeam->save();

        return redirect()->route('proponents.projects.approved-projects.index')->with('success', 'Data Successfully Added!');
    }

    

    public function show($id)
    {
        $projectteam = ProjectTeamModel::findOrFail($id);

        return view('proponents.projects.show', compact('projects','reviewers'));
    }

    public function edit($id)
    {
        $projectteam = ProjectTeamModel::findOrFail($id);

        return view('proponents.projects.edit', compact('projects', 'reviewers'));
    }


    public function update(Request $request, $id)
    {
        $projectteam = ProjectTeamModel::findOrFail($id);
        $projectteam->update($request->all());

        return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
        
    }


    public function destroy($id)
    {
        $projectteam = AnnouncementsModel::findOrFail($id);
        $projectteam->delete();

        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }


}
