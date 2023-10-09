<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TaskModel;
use App\Notifications\TaskDeadlineNotification;
use App\Models\UsersModel;
use App\Models\ProjectTeamModel;
use Illuminate\Support\Facades\Notification;
use App\Rules\DateNotBeforeToday;

class TaskController extends Controller
{
    protected $task;

    public function __construct(TaskModel $task)
    {
        $this->task = $task;
    }
    public function index()
    {
        $tasks = TaskModel::all();
        return view('submission-details.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tasks = TaskModel::all();
        $teamMembers = ProjectTeamModel::all();
        return view('submission-details.tasks.create', compact('tasks', 'teamMembers'));
    }

    public function store(Request $request)
    {
    // Define validation rules for the incoming request data
    $rules = [
        'project_id' => 'required|exists:projects,id',
        'title' => 'required|string',
        'description' => 'nullable|string',
        'start_date' => ['required', 'date', 'after_or_equal:today'], // Set 'start_date' to today or a future date
        'end_date' => [
            'required',
            'date',
            function ($attribute, $value, $fail) use ($request) {
                $start_date = $request->input('start_date');
                
                if ($value && strtotime($value) < strtotime($start_date)) {
                    $fail('The end date must be on or after the start date.');
                }
            },
        ],
        'assigned_to' => 'required|exists:users,id',
    ];

    // Define custom error messages
    $customMessages = [
        'start_date.after_or_equal' => 'The start date must be today or a future date.',
        'end_date.after' => 'The end date must be after the start date.',
    ];

    try {

    // Validate the request data against the defined rules
    $validatedData = $request->validate($rules, $customMessages);

    // Create the task using the validated data
    $task = TaskModel::create($validatedData);

    // Send notification if the task deadline is in the future
    if ($task->end_date > Carbon::now()) {
        // Retrieve the user associated with the task
        $user = $task->assignedUser;

        // Send the notification to the user
        // Notification::send($user, new TaskDeadlineNotification($task));
    }
    return redirect()->back();

    } catch (QueryException $e) {
    // If an exception is thrown, it means there was a database error
    // You can handle this error by returning an error response
    // You can pass the error message to the view for the modal
    $errorMessage = 'Error: Unable to create the task. Please try again later.';

    // Return a response, passing the error message to the view
    return view('errors.errorView')->with('error', $errorMessage);
   }
   }


    // public function store(Request $request)
    // {
    //     $projectId = $request->input('project_id');
    //     $requestData = $request->all();
    //     $requestData['project_id'] = $projectId;
    //     $task = TaskModel::create($requestData);

    //     // Send notification if the task deadline is in the future
    //     if ($task->end_date > Carbon::now()) {
    //         // Retrieve the user associated with the task
    //         $user = $task->assignedUser;

    //         // Send the notification to the user
    //         Notification::send($user, new TaskDeadlineNotification($task));
    //     }

    //     return redirect()->route('submission-details.tasks.index')->with('success', 'Task created successfully.');
    // }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $tasks = TaskModel::findOrFail($id);

        return view('tasks.show', compact('members'));
    }
    public function edit($id)
    {
        $task = TaskModel::findOrFail($id);
        // $members = UsersModel::all();
        $members = UsersModel::where('role', 3)->get();
        return view('submission-details.tasks.edit', compact('task', 'members'));
    }

    // public function update(Request $request, Schedule $schedule)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required',
    //         'description' => 'nullable',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after:start_date',
    //         'assigned_to' => 'required',
    //     ]);

    //     $schedule->update($validatedData);

    //     return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $task = TaskModel::findOrFail($id);
        // Update the item properties using the request data
        $task->update($request->all());

        // return redirect()->route('schedules.show', ['schedule' => $schedule->id])->with('success', 'Schedule updated successfully.');

        return redirect()->route('submission-details.tasks.index')->with('success', 'Data Successfully Updated!');
    }


    public function destroy($id)
    {
        $task = TaskModel::findOrFail($id);
        $task->delete();

        return redirect()->route('submission-details.tasks.index')->with('success', 'Schedule deleted successfully.');
    }

}
