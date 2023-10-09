<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessRequestModel;
use Illuminate\Support\Facades\Auth;

class AccessRequestController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = AccessRequestModel::all();
        $records = AccessRequestModel::orderBy('created_at', 'ASC')->get();

        return view('transparency.access-requests.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.access-requests.create');
    }
    public function store(Request $request)
    {
        try {
            // Get the authenticated user's ID
            $userId = Auth::id();
    
            // Define validation rules for the incoming request data
            $rules = [
                'role' => 'required|string',
                'dateofaccess' => 'required|date_format:Y-m-d|after_or_equal:today', 
                'timeofaccess' => [
                    'required',
                    'after_or_equal:07:00:00', // After or equal to 7 am
                    'before_or_equal:17:00:00', // Before or equal to 5 pm
                ],
                'purposeofaccess' => 'required|string',
                'dateapproved' => ['nullable', 'date', 'after_or_equal:today'],
            ];
    
            // Define custom validation error messages if needed
            $messages = [
                'dateofaccess.date_format' => 'The date of access field must be in the format Y-m-d.',
                'dateofaccess.after_or_equal' => 'The date of access must be equal to or after today.',
                'timeofaccess.after_or_equal' => 'The time of access must be after or equal to 07:00 (7 am).',
                'timeofaccess.before_or_equal' => 'The time of access must be before or equal to 17:00 (5 pm).',
                'dateapproved.after_or_equal' => 'The date approved must be equal to or after today.',    
            ];
    
            // Validate the request data against the defined rules
            $validatedData = $request->validate($rules, $messages);

            // Create the AccessRequestModel instance using the validated data
            $requestModel = new AccessRequestModel;
            $requestModel->fill($validatedData);
            $requestModel->user_id = $userId;
            $requestModel->save();
    
    
            // Redirect to the index or show view, or perform other actions
            return redirect()->back()->with('success', 'Data Successfully Added!');
        } catch (QueryException $e) {
            // If an exception is thrown, it means there was a database error
            // You can handle this error by returning an error response
            // You can pass the error message to the view for the modal
            $errorMessage = 'Error: Unable to create access-requests. Please try again later.';
    
            // Return a response, passing the error message to the view
            return view('errors.errorView')->with('error', $errorMessage);
        }
    }
    

    // public function store(Request $request)
    // {
    //     AccessRequestModel::create($request->all());

    //     // Redirect to the index or show view, or perform other actions
    //     return redirect()->route('access-requests')->with('success', 'Data Successfully Added!');
    // }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $accessrequests = AccessRequestModel::findOrFail($id);

        return view('transparency.access-requests.show', compact('accessrequests'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $accessrequests = AccessRequestModel::findOrFail($id);

        return redirect()->back()->with('success', 'Data Successfully Updated!');
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $accessrequests = AccessRequestModel::findOrFail($id);
        // Update the item properties using the request data
        $accessrequests->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->back()->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $accessrequests = AccessRequestModel::findOrFail($id);
        $accessrequests->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('researcher.home')->with('success', 'Data Successfully Deleted!');
    }

}
