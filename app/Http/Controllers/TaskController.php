<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;
use Exception;
// use App\Notifications\TaskDeadlineNotification;
use App\Models\User;
use App\Models\Member;
// use Illuminate\Support\Facades\Notification;
// use App\Rules\DateNotBeforeToday;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
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
            $task = Task::create($validatedData);

            // Send notification if the task deadline is in the future
            if ($task->end_date > Carbon::now()) {
                // Retrieve the user associated with the task
                $user = $task->assignedUser;

                // Send the notification to the user
                // Notification::send($user, new TaskDeadlineNotification($task));
            }
            return redirect()->back()->with('success', 'Task Added');
        } catch (QueryException $e) {
            // If an exception is thrown, it means there was a database error
            // You can handle this error by returning an error response
            // You can pass the error message to the view for the modal
            $errorMessage = 'Error: Unable to create the task. Please try again later.';
            // Return a response, passing the error message to the view
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function index()
    {
        try {
            $tasks = Task::all();
            return view('submission-details.tasks.index', compact('tasks'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $tasks = Task::all();
            $teamMembers = Member::all();
            return view('submission-details.tasks.create', compact('tasks', 'teamMembers'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
            return view('tasks.show', compact('task'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $task = Task::findOrFail($id);
            $members = User::where('role', 3)->get();
            return view('submission-details.tasks.edit', compact('task', 'members'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->update($request->all());
            return redirect()->back()->with('success', 'Task Successfully Updated!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete(); 
            return redirect()->back()->with('success', 'Task deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }
}