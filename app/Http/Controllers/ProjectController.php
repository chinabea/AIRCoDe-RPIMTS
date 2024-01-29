<?php

namespace App\Http\Controllers;
use App\Notifications\ResearchProposalSubmissionNotification;
use Exception;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\CallForProposal;
use App\Models\LineItemBudget;
use Illuminate\Http\Request;
use App\Models\Version;
use App\Models\Project;
use App\Models\User;
use App\Models\Review;
use App\Models\Member;
use App\Models\Task;
use App\Models\File;
// use Rorecek\Ulid\Ulid;

class ProjectController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules
        ]);

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Store the image in the 'public/uploads' directory
        $image->storeAs('public/uploads', $imageName);

        // Return the URL of the stored image
        return response()->json(['location' => asset('storage/uploads/' . $imageName)]);
    }

    public function index()
    {
        try {
            // Fetch records and related data from the database
            $projects = Project::all();
            $reviewers = User::whereIn('id', Review::pluck('user_id'))->get();
            $call_for_proposals = CallForProposal::all();

            // return view('projects.index', compact('projects', 'reviewers', 'call_for_proposals')->with('success', 'Research Proposal Successfully Submmitted!');
            return view('projects.index', compact('projects', 'reviewers', 'call_for_proposals'))->with('success', 'Research Proposal Successfully Submitted!');

        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while fetching project data: ' . $e->getMessage());
        }
    }


    public function create()
    {
        try {
            $project = new Project();
            $users = User::all();
            $call_for_proposals = CallForProposal::all();

            return view('projects.create', ['call_for_proposals' => $call_for_proposals])->with('success', 'Research Proposal Successfully Submmitted!');
            // return redirect()->route('submission-details.show')->with('success', 'Research Proposal Successfully Submmitted!');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->route('projects.create')->with('error', 'An error occurred while creating the project: ' . $e->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'call_for_proposal_id' => 'required',
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
                $projects->status = 'Draft';
            } else {
                // Set the project status as 'under evaluation' for the regular submission
                $projects->status = 'Under evaluation';

            }
            $projects->user_id = $userId;
            $projects->call_for_proposal_id = $request->call_for_proposal_id;
            $projects->project_name = $request->project_name;
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
            
            $projMembers = Member::where('id', $projects->id)->get();
            $tasks = Task::where('project_id', $projects->id)->get();
            $teamMembers = Member::where('project_id', $projects->id)->get();
            $allLineItems = LineItemBudget::all();
            $lineItems = LineItemBudget::where('project_id', $projects->id)->get();
            $files = File::where('project_id', $projects->id)->get();
            $reviewers = Review::where('user_id', $projects->id)->get();
            $toreview = Review::where('project_id', $projects->id)->get()->first();
            $members = User::where('role', 3)->get();
            $reviewersss = User::where('role', 4)->get();
            $data = Project::findOrFail($projects->id);
            $records = Project::with('versions')->findOrFail($projects->id);
            $call_for_proposals = CallForProposal::all();
            $trackingCode = $data->tracking_code;
            $revised = Version::where('tracking_code', $trackingCode)->get();

            $assignedReviewers = Review::where('project_id', $projects->id)->with('reviewer')->get();

            $reviewerCommented = Review::where('user_id', Auth::user()->id)
            ->where('project_id', $projects->id)
            ->count();

            // Calculate the total of all line items
            $totalAllLineItems = 0;
            foreach ($lineItems as $item) {
                $totalAllLineItems += $item->amount; // Adjust this based on your LineItemBudget structure
            }
            
            if ($projects->status === 'Draft') {
                return redirect()->route('status.draft')->with('success', 'Research Draft Successfully!');
            } elseif ($projects->status === 'Under Evaluation') {
                return redirect()
                ->route('submission-details.show', ['id' => $projects->id])
                ->with([
                    'success' => 'Research Proposal Successfully Submitted!',
                    'id' => $projects->id,  // Add other variables as needed
                    'projMembers' => $projMembers,
                    'call_for_proposals' => $call_for_proposals,
                    'revised' => $revised,
                    'records' => $records,
                    'reviewers' => $reviewers,
                    'toreview' => $toreview,
                    'reviewersss' => $reviewersss,
                    'teamMembers' => $teamMembers,
                    'lineItems' => $lineItems,
                    'allLineItems' => $allLineItems,
                    'files' => $files,
                    'totalAllLineItems' => $totalAllLineItems,
                    'members' => $members,
                    'tasks' => $tasks,
                    'data' => $data,
                    'reviewerCommented' => $reviewerCommented,
                    'assignedReviewers' => $assignedReviewers,
                ]);
            }

        } catch (Exception $e) {
        // Handle the exception here, you can log it or return an error response
        return redirect()->route('projects')->with('error', 'An error occurred while submitting the research proposal: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            
            // $data = Version::findOrFail($id);
            $projMembers = Member::where('id', $id)->get();
            $tasks = Task::where('project_id', $id)->get();
            $teamMembers = Member::where('project_id', $id)->get();
            $allLineItems = LineItemBudget::all();
            $lineItems = LineItemBudget::where('project_id', $id)->get();
            $files = File::where('project_id', $id)->get();
            $reviewers = Review::where('user_id', $id)->get();
            $toreview = Review::where('project_id', $id)->get()->first();
            $members = User::where('role', 3)->get();
            $reviewersss = User::where('role', 4)->get();
            $data = Project::findOrFail($id);
            $records = Project::with('versions')->findOrFail($id);
            $call_for_proposals = CallForProposal::all();
            $trackingCode = $data->tracking_code;
            $revised = Version::where('tracking_code', $trackingCode)->get();

            $assignedReviewers = Review::where('project_id', $id)->with('reviewer')->get();

            $reviewerCommented = Review::where('user_id', Auth::user()->id)
            ->where('project_id', $id)
            ->count();

            // Calculate the total of all line items
            $totalAllLineItems = 0;
            foreach ($lineItems as $item) {
                $totalAllLineItems += $item->amount; // Adjust this based on your LineItemBudget structure
            }

            return view('submission-details.show', compact('id', 'projMembers', 'call_for_proposals', 'revised', 'records', 'reviewers', 'toreview','reviewersss', 'teamMembers',
                        'lineItems', 'allLineItems', 'files', 'totalAllLineItems', 'members', 'tasks', 'data',
                        'reviewerCommented', 'assignedReviewers'));
            
    
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while showing the project: ' . $e->getMessage());
        }

    }

    public function edit($id)
    {
        try {
            $reviewers = User::where('role', 4)->get();
            $projects = Project::findOrFail($id);
            $projectTeam = Member::findOrFail($id);

            $records = Project::findOrFail($id);

            return view('projects.edit', compact('projects', 'reviewers', 'projectTeam', 'records'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while editing the project: ' . $e->getMessage());
        }
    }

    public function editDraft($id)
    {
        try {
            $reviewers = User::where('role', 4)->get();
            $projects = Project::findOrFail($id);
            // $projectTeam = Member::findOrFail($id);

            $records = Project::findOrFail($id);

            return view('projects.edit', compact('projects', 'reviewers','records'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while editing the project: ' . $e->getMessage());
        }
    }
    
    public function updateDraft(Request $request, $id)
    {
        try {
            $userId = Auth::id();
            $record = Project::findOrFail($id);
    
            // Update the project record with the new values from the form
            $record->project_name = $request->input('project_name');
            if ($request->has('draft_submit')) {
                // Set the project status as 'draft'
                $record->status = 'Draft';
            } else {
                // Set the project status as 'under evaluation' for the regular submission
                $record->status = 'Under Evaluation';

            }
            $record->research_group = $request->input('research_group');
            $record->introduction = $request->input('introduction');
            $record->aims_and_objectives = $request->input('aims_and_objectives');
            $record->background = $request->input('background');
            $record->expected_research_contribution = $request->input('expected_research_contribution');
            $record->proposed_methodology = $request->input('proposed_methodology');
            $record->workplan = $request->input('workplan');
            $record->resources = $request->input('resources');
            $record->references = $request->input('references');
    
            // Save the updated project record
            $record->save();

            if ($record->status === 'Draft') {
                return redirect()->route('status.draft')->with('success', 'Research Draft Successfully!');
            } elseif ($record->status === 'Under Evaluation') {
                    return redirect()->route('submission-details.show', ['id' => $record->id])->with(['success' => 'Research Proposal Successfully Submitted!','id' => $record->id,]);
            }
    
        } catch (Exception $e) {
            // Handle the exception, you can log it or return an error response
            return redirect()->back()->with('error', 'An error occurred while updating the file: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $userId = Auth::id();
            $record = Project::findOrFail($id);
            $newVersionNumber = $record->versions()->max('version_number') + 1;
    
            $newVersion = new Version([
                'user_id' => $userId,
                'version_number' => $newVersionNumber,
                'tracking_code' => $request->input('tracking_code'),
                'call_for_proposal_id' => $request->input('call_for_proposal_id'),
                'project_name' => $request->input('project_name'),
                'research_group' => $request->input('research_group'),
                'introduction' => $request->input('introduction'),
                'aims_and_objectives' => $request->input('aims_and_objectives'),
                'background' => $request->input('background'),
                'expected_research_contribution' => $request->input('expected_research_contribution'),
                'proposed_methodology' => $request->input('proposed_methodology'),
                'workplan' => $request->input('workplan'),
                'resources' => $request->input('resources'),
                'references' => $request->input('references'),
                // 'total_budget' => $request->input('total_budget'),
            ]);
    
            $record->versions()->save($newVersion);
    
            // Update the project record with the new values from the form
            $record->project_name = $request->input('project_name');
            $record->research_group = $request->input('research_group');
            $record->introduction = $request->input('introduction');
            $record->aims_and_objectives = $request->input('aims_and_objectives');
            $record->background = $request->input('background');
            $record->expected_research_contribution = $request->input('expected_research_contribution');
            $record->proposed_methodology = $request->input('proposed_methodology');
            $record->workplan = $request->input('workplan');
            $record->resources = $request->input('resources');
            $record->references = $request->input('references');
    
            // Save the updated project record
            $record->save();
    
            return redirect()->back()->with('success', 'Research Proposal Successfully Updated!');
        } catch (Exception $e) {
            // Handle the exception, you can log it or return an error response
            return redirect()->back()->with('error', 'An error occurred while updating the file: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $projects = Project::findOrFail($id);
            $projects->delete();
            return redirect()->back()->with('success', 'Reseach Proposal Successfully Deleted!');
        } catch (Exception $e) {
            // Handle the exception, you can log it or return an error response
            return redirect()->route('projects')->with('error', 'An error occurred while deleting the Reseach Proposal: ' . $e->getMessage());
        }
    }

}
