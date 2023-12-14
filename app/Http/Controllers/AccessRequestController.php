<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\AccessRequest;


class AccessRequestController extends Controller
{   
    
    public function approve($id)
    {
        $accessRequest = AccessRequest::findOrFail($id);
        $accessRequest->status = 'approved';
        $accessRequest->save();
    
        return response()->json(['message' => 'Access request approved successfully']);
    }
    
    public function decline($id)
    {
        $accessRequest = AccessRequest::findOrFail($id);
        $accessRequest->status = 'declined';
        $accessRequest->save();
    
        return response()->json(['message' => 'Access request declined successfully']);
    }
    

    // public function addStatus(Request $request)
    // {
    //     try {
    //         // Get the authenticated user's ID
    //         $userId = Auth::id();

    //         // Define validation rules for the incoming request data
    //         // $rules = [
    //         //     // 'role' => 'required|string',
    //         //     'date_of_access' => 'required|date_format:Y-m-d|after_or_equal:today',
    //         //     'time_of_access' => [
    //         //         'required',
    //         //         'after_or_equal:07:00:00', // After or equal to 7 am
    //         //         'before_or_equal:17:00:00', // Before or equal to 5 pm
    //         //     ],
    //         //     'purpose_of_access' => 'required|string',
    //         //     'date_approved' => ['nullable', 'date', 'after_or_equal:today'],
    //         // ];

    //         // Define custom validation error messages if needed
    //         // $messages = [
    //         //     'date_of_access.date_format' => 'The date of access field must be in the format Y-m-d.',
    //         //     'date_of_access.after_or_equal' => 'The date of access must be equal to or after today.',
    //         //     'time_of_access.after_or_equal' => 'The time of access must be after or equal to 07:00 (7 am).',
    //         //     'time_of_access.before_or_equal' => 'The time of access must be before or equal to 17:00 (5 pm).',
    //         //     'date_approved.after_or_equal' => 'The date approved must be equal to or after today.',
    //         // ];

    //         // Validate the request data against the defined rules
    //         // $validatedData = $request->validate($rules, $messages);

    //         // Create the AccessRequest instance using the validated data
    //         $requestModel = new AccessRequest;
    //         $requestModel->user_id = $userId;
    //         $requestModel->status = $status;
    //         $requestModel->save();


    //         // Redirect to the index or show view, or perform other actions
    //         return redirect()->route('access-requests')->with('success', 'Access Requests Successfully Submitted!');
    //     } catch (QueryException $e) {
    //         // If an exception is thrown, it means there was a database error
    //         // You can handle this error by returning an error response
    //         // You can pass the error message to the view for the modal
    //         $errorMessage = 'Error: Unable to create access-requests. Please try again later.';
    //         // return view('errors.errorView')->with('error', $errorMessage);
    //         // Redirect back with the error message
    //         return redirect()->route('access-requests')->with('error', $errorMessage);

    //     }
    // }
    
    
    public function index()
    {
        try {
            // Fetch all records from the model and pass them to the view
            // $items = AccessRequest::all();
            $records = AccessRequest::orderBy('created_at', 'ASC')->get();

            return view('transparency.access-requests.index', compact('records'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while fetching access requests: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            // Return the view for creating a new item
            return view('transparency.access-requests.create');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return redirect()->route('access-requests')->with('error', 'An error occurred while accessing the create view: ' . $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Define validation rules for the incoming request data
            $rules = [
                // 'role' => 'required|string',
                'date_of_access' => 'required|date_format:Y-m-d|after_or_equal:today',
                'time_of_access' => [
                    'required',
                    'after_or_equal:07:00:00', // After or equal to 7 am
                    'before_or_equal:17:00:00', // Before or equal to 5 pm
                ],
                'purpose_of_access' => 'required|string',
                'date_approved' => ['nullable', 'date', 'after_or_equal:today'],
            ];

            // Define custom validation error messages if needed
            $messages = [
                'date_of_access.date_format' => 'The date of access field must be in the format Y-m-d.',
                'date_of_access.after_or_equal' => 'The date of access must be equal to or after today.',
                'time_of_access.after_or_equal' => 'The time of access must be after or equal to 07:00 (7 am).',
                'time_of_access.before_or_equal' => 'The time of access must be before or equal to 17:00 (5 pm).',
                'date_approved.after_or_equal' => 'The date approved must be equal to or after today.',
            ];

            // Validate the request data against the defined rules
            $validatedData = $request->validate($rules, $messages);

            // Create the AccessRequest instance using the validated data
            $requestModel = new AccessRequest;
            $requestModel->fill($validatedData);
            $requestModel->user_id = $userId;
            $requestModel->save();


            // Redirect to the index or show view, or perform other actions
            return redirect()->route('access-requests')->with('success', 'Access Requests Successfully Submitted!');
        } catch (QueryException $e) {
            // If an exception is thrown, it means there was a database error
            // You can handle this error by returning an error response
            // You can pass the error message to the view for the modal
            $errorMessage = 'Error: Unable to create access-requests. Please try again later.';
            // return view('errors.errorView')->with('error', $errorMessage);
            // Redirect back with the error message
            return redirect()->route('access-requests')->with('error', $errorMessage);

        }
    }

    public function show($id)
    {
        try {
            // Retrieve and show the specific item using the provided ID
            $accessrequests = AccessRequest::findOrFail($id);

            return view('transparency.access-requests.show', compact('accessrequests'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while fetching the access request: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // Retrieve and update the specific item
            $accessRequest = AccessRequest::findOrFail($id);

            // Perform the necessary updates to the $accessRequest model here.
            // Example: $accessRequest->update(['field_name' => $new_value]);

            return redirect()->back()->with('success', 'Access request Successfully Updated!');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while editing access request: ' . $e->getMessage());
        }
    }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         // Validation rules
    //         $rules = [
    //             'date_of_access' => 'required|date_format:Y-m-d|after_or_equal:today',
    //             'time_of_access' => [
    //                 'required',
    //                 'after_or_equal:07:00:00', // After or equal to 7 am
    //                 'before_or_equal:17:00:00', // Before or equal to 5 pm
    //             ],
    //             'purpose_of_access' => 'required|string',
    //             'date_approved' => ['nullable', 'date', 'after_or_equal:today'],
    //         ];

    //         $this->validate($request, $rules);

    //         // If validation passes, continue with the update
    //         $accessrequests = AccessRequest::findOrFail($id);
    //         $accessrequests->update($request->all());

    //         // Redirect to the index or show view, or perform other actions
    //         return redirect()->back()->with('success', 'Access Requests Successfully Updated!');
    //     } catch (Exception $e) {
    //         // Handle the exception, you can log it for debugging or display an error message to the user.
    //         return back()->with('error', 'An error occurred while updating access requests: ' . $e->getMessage());
    //     }
    // }

    public function update(Request $request, $id)
    {
        // try {
            // Validation rules
            // $rules = [
            //     'date_approved' => ['nullable', 'date', 'after_or_equal:today'],
            // ];

            $this->validate($request, $rules);

            // If validation passes, update only the "date_approved" field
            $accessRequest = AccessRequest::findOrFail($id);
            $accessRequest->update([
                'status' => $request->input('status'),
            ]);

            // Redirect to the index or show view, or perform other actions
            return redirect()->back()->with('success', 'Access Requests Successfully Updated!');
        // } catch (Exception $e) {
        //     // Handle the exception, you can log it for debugging or display an error message to the user.
        //     return back()->with('error', 'An error occurred while updating access requests: ' . $e->getMessage());
        // }
    }


    public function destroy($id)
    {
        try {
            // Delete the item with the provided ID
            $accessrequests = AccessRequest::findOrFail($id);
            $accessrequests->delete();

            // Redirect to the index or perform other actions
            return redirect()->back()->with('success', 'Access Requests Successfully Deleted!');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while deleting access requests: ' . $e->getMessage());
        }
    }


}
