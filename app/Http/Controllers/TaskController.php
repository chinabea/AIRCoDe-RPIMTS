<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TaskModel;
use App\Notifications\TaskDeadlineNotification;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Notification;

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
        $members = UsersModel::where('role', 3)->get();
        return view('submission-details.tasks.create', compact('tasks', 'members'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'assigned_to' => 'required',
        ]);

        $task = TaskModel::create($validatedData);

        // Send notification if the task deadline is in the future
        if ($task->end_date > Carbon::now()) {
            // Retrieve the user associated with the task
            $user = $task->assignedUser;

            // Send the notification to the user
            Notification::send($user, new TaskDeadlineNotification($task));
        }

        return redirect()->route('submission-details.tasks.index')->with('success', 'Task created successfully.');
    }

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
