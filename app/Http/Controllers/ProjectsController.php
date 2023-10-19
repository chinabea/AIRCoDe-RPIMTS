<?php

namespace App\Http\Controllers;
use App\Notifications\ResearchProposalSubmissionNotification;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\DateNotBeforeToday;
use App\Rules\NotBeforeTodaysMonthYear;
use App\Models\ProjectsModel;
use App\Models\UsersModel;
use App\Models\User;
use App\Models\ReviewModel;
use App\Models\ProjectTeamModel;
use App\Models\LineItemBudgetModel;
use App\Models\TaskModel;
use App\Models\FileModel;
use App\Models\ProjectHistory;

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
        $projects = ProjectsModel::all();
        $reviewers = User::whereIn('id', ReviewModel::pluck('user_id'))->get();

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
            // 'authors' => 'required',
            'introduction' => 'required',
            'aims_and_objectives' => 'required',
            'background' => 'required',
            'expected_research_contribution' => 'required',
            'proposed_methodology' => 'required',
            'workplan' => 'required',
            // 'start_month' => [
            //     'required',
            //     'date_format:Y-m',
            //     'after_or_equal:' . date('Y-m'),
            // ],
            // 'end_month' => [
            //     'required',
            //     'date_format:Y-m',
            //     function ($attribute, $value, $fail) use ($request) {
            //         $startMonth = $request->input('start_month');
            //         $currentDate = date('Y-m');

            //         if (strtotime($value) < strtotime($startMonth) || strtotime($value) < strtotime($currentDate)) {
            //             $fail('The end month must be after the start month and in the future.');
            //         }
            //     },
            // ],
            'resources' => 'required',
            'references' => 'required',
        ]);

        // Retrieve the input values
        // $startMonthYear = $request->input('start_month');
        // $endMonthYear = $request->input('end_month');
    
        // Convert the input values to Carbon instances for date calculations
        // $startDate = \Carbon\Carbon::parse($startMonthYear . '-01');
        // $endDate = \Carbon\Carbon::parse($endMonthYear . '-01');
    
        // // Calculate the difference in months between start and end dates
        // $workplanMonths = $endDate->diffInMonths($startDate);
        
        $userId = Auth::id();

        $projects = new ProjectsModel;
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
            // $projects->authors = $request->authors;
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

        $tasks = TaskModel::with('assignedTo')->get();
        // $tasks = TaskModel::get();
        $teamMembers = ProjectTeamModel::all();
        $allLineItems = LineItemBudgetModel::all();
        $projMembers = ProjectTeamModel::where('project_id', $id)->get();
        $lineItems = LineItemBudgetModel::where('project_id', $id)->get();
        $files = FileModel::where('project_id', $id)->get();
        $reviewers = ReviewModel::where('user_id', $id)->get();
        $toreview = ReviewModel::where('project_id', $id)->get()->first();
        $members = UsersModel::where('role', 3)->get();
        $reviewersss = UsersModel::where('role', 4)->get();
        $data = ProjectsModel::findOrFail($id);
        $records = ProjectsModel::findOrFail($id);

        // $reviewerCommented = ReviewModel::where('user_id', Auth::user()->id)->get();
        // $comments = ReviewModel::findOrFail($id);

        $reviewerCommented = ReviewModel::where('user_id', Auth::user()->id)
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
            $totalAllLineItems += $item->amount; // Adjust this based on your LineItemBudgetModel structure
        }

        return view('submission-details.show', compact('id', 'records', 'reviewers', 'toreview','reviewersss', 'teamMembers',
                    'lineItems', 'allLineItems', 'files', 'totalAllLineItems', 'members', 'tasks', 'data', 'projMembers', 
                    'reviewerCommented'));

    }


    public function edit($id)
    {
        $reviewers = UsersModel::where('role', 4)->get();
        $projects = ProjectsModel::findOrFail($id);
        $projectTeam = ProjectTeamModel::findOrFail($id);

        $records = ProjectsModel::findOrFail($id);

        return view('projects.edit', compact('projects', 'reviewers', 'projectTeam', 'records'));
    }

    public function update(Request $request, $id)
    {
        $records = ProjectsModel::findOrFail($id);

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
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();
        return redirect()->route('projects')->with('success', 'Reseach Proposal Successfully Deleted!');
    }
}
