<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileModel;

class ProjectFileController extends Controller
{
    public function create($project)
    {
        return view('upload', ['projectId' => $project]);
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|max:10240', // Max file size: 10MB
            'project_id' => 'required|exists:projects,id', // Validate that the project exists
        ]);

        // Store the uploaded file
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('project_files');

        // Create a new project file entry
        FileModel::create([
            'project_id' => $request->input('project_id'),
            'file_name' => $fileName,
            'file_path' => $filePath,
            // 'uploaded_at' => now(),
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function show(FileModel $file)
    {
        // Add logic to show the file details or download the file
    }

    public function destroy(FileModel $file)
    {
        // Delete the file and its record from the database
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }



}
