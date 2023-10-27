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
use App\Models\Member;
use App\Models\LineItemBudget;
use App\Models\Task;
use App\Models\File;
use App\Models\ProjectHistory;
use Rorecek\Ulid\Ulid;

class ProjectController extends Controller
{
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

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
            'project_name' => 'required',
            'research_group' => 'required',
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

        // Define the character pool for random letters (capital letters only)
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Generate a string of 4 random letters
        $randomLetters = '';
        for ($i = 0; $i < 4; $i++) {
            $randomLetters .= $letters[random_int(0, strlen($letters) - 1)];
        }

        // Generate a string of 4 random numbers
        $randomNumbers = sprintf('%04d', random_int(0, 9999));

        // Combine and jumble the random letters and numbers
        $ulidValue = str_shuffle($randomLetters . $randomNumbers);

        // Create the Project model with the ULID
        $projects = new Project(['tracking_code' => $ulidValue]);

        // $projects = new Project;
        $projects->project_name = $request->project_name;
        if ($request->has('draft_submit')) {
            // Set the project status as 'draft'
            $projects->status = 'draft';
        } else {
            // Set the project status as 'under evaluation' for the regular submission
            $projects->status = 'under evaluation';

        }
        $projects->user_id = $userId;
        $projects->research_group = $request->research_group;
        $projects->introduction = $request->introduction;
        $projects->aims_and_objectives = $request->aims_and_objectives;
        $projects->background = $request->background;
        $projects->expected_research_contribution = $request->expected_research_contribution;
        $projects->proposed_methodology = $request->proposed_methodology;
        $projects->workplan = $request->workplan;
        $projects->resources = $request->resources;
        $projects->references = $request->references;

        $projects->save();

        $researcher = User::find($userId);
        $researcherMail = $researcher->email;
        $projectTitle = $projects->project_name;
        $trackingCode = $projects->tracking_code;
        $createdAt = $projects->created_at;
        $directors = User::where('role', true)->get();

        if ($directors) {
            foreach ($directors as $director) {
                $director->notify(new ResearchProposalSubmissionNotification($projects->id, $trackingCode, $createdAt, $userId, $researcherMail, $projectTitle, $projects));
            }
        }
        if ($researcher) {

            $researcher->notify(new ResearchProposalSubmissionNotification($projects->id, $trackingCode, $createdAt, $userId, $researcherMail, $projectTitle, $projects));
        }

        return redirect()->route('projects')->with('success', 'Research Proposal Successfully Submmitted!');
    }

    public function show($id)
    {

        $tasks = Task::with('assignedTo')->get();
        // $tasks = Task::get();
        $teamMembers = Member::all();
        $allLineItems = LineItemBudget::all();
        $projMembers = Member::where('project_id', $id)->get();
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
        $projectTeam = Member::findOrFail($id);

        $records = Project::findOrFail($id);

        return view('projects.edit', compact('projects', 'reviewers', 'projectTeam', 'records'));
    }

    public function update(Request $request, $id)
    {
        $records = Project::findOrFail($id);

        // Update the project record with the new values from the form
        $records->project_name = $request->input('project_name');
        $records->research_group = $request->input('research_group');
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
