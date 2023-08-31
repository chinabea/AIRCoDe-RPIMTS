<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\FileModel;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {

        return view('submission-details.files');
    }

    public function create()
    {
        return view('submission-details.files.create');
    }
    public function store(Request $request)
    {
        // Validate the uploaded file and project_id
        $request->validate([
            'file' => 'required|file|max:10240', // Max file size: 10MB
            'project_id' => 'required|exists:projects,id', // Validate that the project exists
        ]);

        // Store the uploaded file
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('project_files');

        try {
            // Create a new project file entry
            FileModel::create([
                'project_id' => $request->input('project_id'),
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);

            return redirect()->back()->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error storing file in the database.');
        }
    }

    public function previewPDF($filename)
    {
        $filePath = 'project_files/' . $filename;

        if (Storage::exists($filePath)) {
            return view('submission-details.files.preview', ['filePath' => $filePath]);
        }

        return response('File not found.', 404);
    }

    public function download($id)
    {
        $file = FileModel::findOrFail($id);

        // Assuming the 'file_name' attribute stores the desired filename in the database
        $fileName = $file->file_name;
        $filePath = $file->file_path;

        return response()->download(storage_path('app/' . $filePath), $fileName);
    }

    public function reupload(Request $request, $id)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|max:10240', // Max file size: 10MB
        ]);

        // Find the existing file entry
        $fileModel = FileModel::where('project_id', $id)->first();

        if (!$fileModel) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // Delete the existing file from storage
        Storage::delete($fileModel->file_path);

        // Store the uploaded file
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('project_files');

        // Update the file entry in the database
        $fileModel->update([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'File reuploaded successfully.');
    }


    public function update(Request $request, $id)
    {
        $file = FileModel::findOrFail($id);
        // Update the item properties using the request data
        $file->update($request->all());

        // return redirect()->route('schedules.show', ['schedule' => $schedule->id])->with('success', 'Schedule updated successfully.');

        return redirect()->route('submission-details.files.index')->with('success', 'Data Successfully Updated!');
    }

    public function delete($id)
    {
        // Delete the file and its record from the database
        $file = FileModel::findOrFail($id);
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }


}
