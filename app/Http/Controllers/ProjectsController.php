<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectsModel;

class ProjectsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = ProjectsModel::all();
        $records = ProjectsModel::orderBy('created_at', 'ASC')->get();

        return view('proponents.projects.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('proponents.projects.create');
    }

    public function store(Request $request)
    {
        ProjectsModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('projects')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $projects = ProjectsModel::findOrFail($id);

        return view('proponents.projects.show', compact('projects'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $projects = ProjectsModel::findOrFail($id);

        return view('proponents.projects.edit', compact('projects'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $projects = ProjectsModel::findOrFail($id);
        // Update the item properties using the request data
        $projects->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('projects')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }
}
