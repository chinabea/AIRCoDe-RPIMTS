<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\UsersModel;

class ScheduleController extends Controller
{   
    public function calendar()
    {
        $schedules = Schedule::all();
        return response()->json($schedules);
    }
    
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        // Retrieve project members from the database and pass them to the view
        $members = UsersModel::all();
        return view('schedules.create', compact('members'));
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

        Schedule::create($validatedData);

        return redirect()->route('schedule')->with('success', 'Schedule created successfully.');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $schedules = Schedule::findOrFail($id);

        return view('schedules.show', compact('members'));
    }
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $members = UsersModel::all();
        return view('schedules.edit', compact('schedule', 'members'));
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
        $schedule = Schedule::findOrFail($id);
        // Update the item properties using the request data
        $schedule->update($request->all());
    
        // return redirect()->route('schedules.show', ['schedule' => $schedule->id])->with('success', 'Schedule updated successfully.');
        
        return redirect()->route('schedule')->with('success', 'Data Successfully Updated!');
    }









    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
