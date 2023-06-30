<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProponentsController extends Controller
{

    public function index()
    {
        $records = ProjectsModel::orderBy('created_at', 'ASC')->get();

        return view('proponents.projects.index', compact('records'));
    }

    public function create()
    {
        return view('proponents.projects.create');
    }

    public function store(Request $request)
    {
        $request->merge(['status' => 'New']);
    
        $document = Document::create($request->all());
    
        // Other logic...
    
        return redirect()->route('documents.index')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        $projects = ProjectsModel::findOrFail($id);

        return view('proponents.projects.show', compact('projects'));
    }

    public function edit($id)
    {
        $projects = ProjectsModel::findOrFail($id);

        return view('proponents.projects.edit', compact('projects'));
    }

    public function update(Request $request, $id)
    {
        // Check if the user is an admin
        if (auth()->user()->isAdmin()) {
            // Update the document status based on user input
            $document->status = $request->input('status');
            $document->save();
        } else {
            // For regular users, only allow updating the content field
            $document->content = $request->input('content');
            $document->save();
        }
    
        // Other logic...
    
        return redirect()->route('documents.index')->with('success', 'Data Successfully Updated!');
      
    }

    public function destroy($id)
    {
        $projects = ProjectsModel::findOrFail($id);
        $projects->delete();

        return redirect()->route('projects')->with('success', 'Data Successfully Deleted!');
    }
}
