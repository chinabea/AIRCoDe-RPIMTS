<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UsersModel;

class TaskController extends Controller
{
    public function getTasks(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');

        $tasks = Task::whereBetween('start_date', [$start, $end])
            ->orWhereBetween('end_date', [$start, $end])
            ->get();

        return response()->json($tasks);
    }

    public function calendar()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tasks = Task::all();
        $members = UsersModel::where('role', 3)->get();
        return view('tasks.create', compact('tasks', 'members'));
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

        Task::create($validatedData);
        // Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $tasks = Task::findOrFail($id);

        return view('tasks.show', compact('members'));
    }
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $members = UsersModel::all();
        return view('tasks.edit', compact('task', 'members'));
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
        $task = Task::findOrFail($id);
        // Update the item properties using the request data
        $task->update($request->all());

        // return redirect()->route('schedules.show', ['schedule' => $schedule->id])->with('success', 'Schedule updated successfully.');

        return redirect()->route('task')->with('success', 'Data Successfully Updated!');
    }


    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Schedule deleted successfully.');
    }

}
