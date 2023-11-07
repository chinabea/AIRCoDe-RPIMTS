<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Exception;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        try {
            // Your logic to retrieve data and perform operations can go here if needed
            return view('submission-details.files');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while loading the file index: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            // Your logic for creating a new file can go here if needed
            return view('submission-details.files.create');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while creating a new file: ' . $e->getMessage());
        }
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
            File::create([
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
        try {
            $filePath = 'project_files/' . $filename;

            if (Storage::exists($filePath)) {
                return view('submission-details.files.preview', ['filePath' => $filePath]);
            }

            return response('File not found.', 404);
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while previewing the PDF: ' . $e->getMessage());
        }
    }

    public function download($id)
    {
        try {
            $file = File::findOrFail($id);

            // Assuming the 'file_name' attribute stores the desired filename in the database
            $fileName = $file->file_name;
            $filePath = $file->file_path;

            return response()->download(storage_path('app/' . $filePath), $fileName);
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while downloading the file: ' . $e->getMessage());
        }
    }

    public function reupload(Request $request, $id)
    {
        try {
            // Validate the uploaded file
            $request->validate([
                'file' => 'required|file|max:10240', // Max file size: 10MB
            ]);

            // Find the existing file entry
            $fileModel = File::where('project_id', $id)->first();

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
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while reuploading the file: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Define validation rules
            $rules = [
                'file' => 'required|file|max:10240', // Max file size: 10MB
                'project_id' => 'required|exists:projects,id', // Validate that the project exists
            ];

            // Validate the request data using the defined rules
            $this->validate($request, $rules);

            // Find the file with the provided ID
            $file = File::findOrFail($id);

            // Update the item properties using the request data
            $file->update($request->all());

            // Redirect to the index or show view, or perform other actions
            return redirect()->route('submission-details.files.index')->with('success', 'File Successfully Updated!');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->back()->with('error', 'An error occurred while updating the file: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            // Delete the file and its record from the database
            $file = File::findOrFail($id);
            $file->delete();

            return redirect()->back()->with('success', 'File deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the file: ' . $e->getMessage());
        }
    }

}
