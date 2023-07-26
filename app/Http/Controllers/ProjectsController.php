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

class ProjectsController extends Controller
{

    public function index()
    {
        $records = ProjectsModel::orderBy('created_at', 'ASC')->get();
        $reviewers = User::whereIn('id', ProjectReviewerModel::pluck('user_id'))->get();

        return view('projects.index', compact('records','reviewers'));
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


    public function selectReviewers()
    {
        $users = UsersModel::where('role', 4)->get();

        return view('submission-details.show', compact('users'));
    }

    public function storeReviewer(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'reviewers' => 'required|array',
            'reviewers.*' => 'exists:users,id',
        ]);

        $projectId = 1; // Replace with the actual project ID you want to associate the reviewers with

        $project = ProjectsModel::findOrFail($projectId);

        // Filter the reviewers based on the user role column (where role = 4)
        $filteredReviewers = User::whereIn('id', $validatedData['reviewers'])
            ->where('role', 4)
            ->pluck('id');

        $project->reviewers()->attach($filteredReviewers);

        // Assuming you have the logic to fetch available reviewers, modify the next line accordingly.
        $reviewers = User::where('role', 4)->get();

        // Pass the $reviewers variable to the view (provide the correct view name as the first argument)
        return view('submission-details.show', compact('reviewers'));
    }
    
    public function show($id)
    {
        $projects = ProjectsModel::findOrFail($id);

        $reviewers = User::whereIn('id', ProjectReviewerModel::pluck('user_id'))->get();


        return view('submission-details.show', compact('projects','reviewers'));
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
        // Find the project by its ID
        $project = ProjectsModel::findOrFail($id);
    
        // Update the status based on the input from the form
        $project->status = $request->input('status');
    
        // Save the updated project in the database
        $project->save();
    
        // Redirect back to the projects page with a success message
        // return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
    }
    
    

    public function destroy($id)
    {
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();

        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Draft,Under Evaluation,For Revision,Approved,Deferred,Disapproved',
        ]);
    
        $project = Project::find($id);
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found.');
        }
    
        $project->status = $request->input('status');
        $project->save();
    
        return redirect()->route('projects.show', ['id' => $id])->with('success', 'Project status updated successfully.');
    }
    
    

    public function draft()
    {
        $projects = ProjectsModel::where('status', 'Draft')->get();

        return view('status.draft', compact('projects'));
    }

    public function underEvaluation()
    {
        $projects = ProjectsModel::where('status', 'Under Evaluation')->get();

        return view('status.under-evaluation', compact('projects'));
    }

    public function forRevision()
    {
        $projects = ProjectsModel::where('status', 'For Revision')->get();

        return view('status.for-revision', compact('projects'));
    }

    public function approved()
    {
        $projects = ProjectsModel::where('status', 'Approved')->get();

        return view('status.approved', compact('projects'));
    }

    public function deferred()
    {
        $projects = ProjectsModel::where('status', 'Deferred')->get();

        return view('status.deferred', compact('projects'));
    }

    public function disapproved()
    {
        $projects = ProjectsModel::where('status', 'Disapproved')->get();

        return view('status.disapproved', compact('projects'));
    }






}
