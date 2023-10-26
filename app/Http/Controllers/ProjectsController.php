<?php

namespace App\Http\Controllers;
use App\Notifications\ResearchProposalSubmissionNotification;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\DateNotBeforeToday;
use App\Rules\NotBeforeTodaysMonthYear;
use App\Models\Project;
use App\Models\User;
use App\Models\Review;
use App\Models\ProjectTeam;
use App\Models\LineItemBudget;
use App\Models\Task;
use App\Models\File;
use App\Models\ProjectHistory;
use rorecek\Ulid\Ulid;

class ProjectsController extends Controller
{
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    // public function ResearchProposalSubmissionNotification($projectId, $researcherId, $researcherMail, $projectTitle){

    //     // Retrieve the project data from the database based on the provided $projectId
    //     $project = Project::find($projectId);
    
    //     if (!$project) {
    //         // Handle the case where the project with the provided ID doesn't exist
    //         return "Project not found.";
    //     }
    
    //     // Pass the project data and other variables to the email view
    //     $emailData = [
    //         'project' => $project,
    //         'researcherId' => $researcherId,
    //         'researcherMail' => $researcherMail,
    //         'projectTitle' => $projectTitle,
    //     ];

    //     // Send the email to the authenticated user who submitted the project
    //     \Mail::to($researcherMail)->send(new ResearchProposalSubmissionNotification($emailData));
    
    //     return "Email sent successfully.";
    // }

    public function index()
    {
        $projects = Project::all();
        $reviewers = User::whereIn('id', Review::pluck('user_id'))->get();

        return view('projects.index', compact('projects', 'reviewers'));
    }


    public function create()
    {
        $project = new Project();

        $users = User::all();

        // Notification::send($users, new ProjectNotification($project->id));

        return view('projects.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'projname' => 'required',
            'researchgroup' => 'required',
            'introduction' => 'required',
            'aims_and_objectives' => 'required',
            'background' => 'required',
            'expected_research_contribution' => 'required',
            'proposed_methodology' => 'required',
            'workplan' => 'required',
            'resources' => 'required',
            'references' => 'required',
        ]);

        $userId = Auth::id();

        $projects = new Project;
        $projects->projname = $request->projname;
        if ($request->has('draft_submit')) {
            // Set the project status as 'draft'
            $projects->status = 'draft';
        } else {
            // Set the project status as 'under evaluation' for the regular submission
            $projects->status = 'under evaluation';

        }        
            $projects->user_id = $userId;
            $projects->researchgroup = $request->researchgroup;    
            $projects->introduction = $request->introduction;
            $projects->aims_and_objectives = $request->aims_and_objectives;
            $projects->background = $request->background;
            $projects->expected_research_contribution = $request->expected_research_contribution;
            $projects->proposed_methodology = $request->proposed_methodology;
            // $projects->start_month = $startDate;
            // $projects->end_month = $endDate;
            $projects->workplan = $request->workplan;
            $projects->resources = $request->resources;
            $projects->references = $request->references;

        $projects->save();
        
        $ulid = Ulid::generate();
        Project::create(['tracking_code' => $ulid]);
        
        $researcher = User::find($userId);
        $researcherMail = $researcher->email;
        $projectTitle = $projects->projname;
        $directors = User::where('role', true)->get();

        if ($directors) {
            foreach ($directors as $director) {
                $director->notify(new ResearchProposalSubmissionNotification($projects->id, $userId, $researcherMail, $projectTitle, $projects));
            }
            // $director->notify(new ResearchProposalSubmissionNotification($projects->id, $userId, $researcherMail, $projectTitle, $projects));
        }

        if ($researcher) {
            // User::find(Auth::user()->id)->notify(new ProjectNotification($projects->id, $userId, $researcherMail, $projectTitle, $projects));

            $researcher->notify(new ResearchProposalSubmissionNotification($projects->id, $userId, $researcherMail, $projectTitle, $projects));
        }

        return redirect()->route('projects')->with('success', 'Research Proposal Successfully Submmitted!');
    }

    public function show($id)
    {

        $tasks = Task::with('assignedTo')->get();
        // $tasks = Task::get();
        $teamMembers = ProjectTeam::all();
        $allLineItems = LineItemBudget::all();
        $projMembers = ProjectTeam::where('project_id', $id)->get();
        $lineItems = LineItemBudget::where('project_id', $id)->get();
        $files = File::where('project_id', $id)->get();
        $reviewers = Review::where('user_id', $id)->get();
        $toreview = Review::where('project_id', $id)->get()->first();
        $members = User::where('role', 3)->get();
        $reviewersss = User::where('role', 4)->get();
        $data = Project::findOrFail($id);
        $records = Project::findOrFail($id);

        // $reviewerCommented = Review::where('user_id', Auth::user()->id)->get();
        // $comments = Review::findOrFail($id);

        $reviewerCommented = Review::where('user_id', Auth::user()->id)
        ->where('project_id', $id)
        ->count();


        // Example logic to determine if the reviewer has commented on contribution_to_knowledge
        // $reviewerCommented = false;
        // foreach ($reviewsOfReviewer as $review) {
        //     if ($review->user->role === 4 && $review->project_contribution_to_knowledge !== null && $review->project_id === $records->id) {
        //         $reviewerCommented = true;
        //         break; // No need to continue if one comment is found
        //     }
        // }

        // Calculate the total of all line items
        $totalAllLineItems = 0;
        foreach ($lineItems as $item) {
            $totalAllLineItems += $item->amount; // Adjust this based on your LineItemBudget structure
        }

        return view('submission-details.show', compact('id', 'records', 'reviewers', 'toreview','reviewersss', 'teamMembers',
                    'lineItems', 'allLineItems', 'files', 'totalAllLineItems', 'members', 'tasks', 'data', 'projMembers', 
                    'reviewerCommented'));

    }


    public function edit($id)
    {
        $reviewers = User::where('role', 4)->get();
        $projects = Project::findOrFail($id);
        $projectTeam = ProjectTeam::findOrFail($id);

        $records = Project::findOrFail($id);

        return view('projects.edit', compact('projects', 'reviewers', 'projectTeam', 'records'));
    }

    public function update(Request $request, $id)
    {
        $records = Project::findOrFail($id);

        // Update the project record with the new values from the form
        $records->projname = $request->input('projname');
        $records->researchgroup = $request->input('researchgroup');
        // $records->authors = $request->input('authors');
        $records->introduction = $request->input('introduction');
        $records->aims_and_objectives = $request->input('aims_and_objectives');
        $records->background = $request->input('background');
        $records->expected_research_contribution = $request->input('expected_research_contribution');
        $records->proposed_methodology = $request->input('proposed_methodology');
        // $records->start_month = $request->input('start_month');
        // $records->end_month = $request->input('end_month');
        $records->workplan = $request->input('workplan');
        $records->resources = $request->input('resources');
        $records->references = $request->input('references');
    
        // Save the updated project record
        $records->save();

        return redirect()->back()->with('success', 'Reseach Proposal Successfully Deleted!');
    }

    public function destroy($id)
    {
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect()->route('projects')->with('success', 'Reseach Proposal Successfully Deleted!');
    }
}
