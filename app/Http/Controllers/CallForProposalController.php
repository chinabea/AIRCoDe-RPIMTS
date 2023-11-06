<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\CallForProposal;

class CallForProposalController extends Controller
{

    public function viewCallforProposals()
    {
        try {
            // Fetch all records from the model and pass them to the view
            // $items = CallForProposal::all();
            $records = CallForProposal::orderBy('created_at', 'ASC')->get();

            return view('transparency.call-for-proposals.call-for-proposals', compact('records'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while viewing Call for Proposals: ' . $e->getMessage());
        }

    }

    public function index()
    {
        
        try {
            // Fetch all records from the model and pass them to the view
            // $items = CallForProposal::all();
            $records = CallForProposal::orderBy('created_at', 'ASC')->get();

            return view('transparency.call-for-proposals.index', compact('records'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while indexing Call for Proposals: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            // Return the view for creating a new item
            return view('transparency.call-for-proposals.create');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while accessing the create view: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
            // Define validation rules for the incoming request data
            $rules = [
                'title' => 'required|string',
                'description' => 'required|string',
                'start_date' => ['required', 'date', 'after_or_equal:yesterday'],

                'end_date' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) use ($request) {
                        $start_date = $request->input('start_date');

                        if ($value && strtotime($value) < strtotime($start_date)) {
                            $fail('The end date must be on or after the start date.');
                        }
                    },
                ],
                'status' => 'nullable|string',
                'remarks' => 'nullable|string',
            ];


            // Define custom error messages
            $customMessages = [
                'start_date.after_or_equal' => 'The start date must be today or a future date.',
                'end_date.after' => 'The end date must be after the start date.',
            ];

            try {

            // Validate the request data against the defined rules
            $validatedData = $request->validate($rules, $customMessages);

            // Create the proposal using the validated data
            CallForProposal::create($validatedData);

            // Redirect to the index or show view, or perform other actions
            return redirect()->route('call-for-proposals')->with('success', 'Call for Proposal Successfully Added!');
        }catch (QueryException $e) {
            // If an exception is thrown, it means there was a database error
            // You can handle this error by returning an error response
            // You can pass the error message to the view for the modal
            $errorMessage = 'Error: Unable to create call for proposals. Please try again later.';

            // Return a response, passing the error message to the view
            // return view('errors.errorView')->with('error', $errorMessage);
            // Redirect back with the error message
            return redirect()->back()->with('error', $errorMessage);

        }
    }

    public function show($id)
    {
        try {
            // Retrieve and show the specific item using the provided ID
            $proposals = CallForProposal::findOrFail($id);

            return view('transparency.call-for-proposals.show', compact('proposals'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while showing the Call for Proposal: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // Retrieve and show the specific item for editing
            $proposals = CallForProposal::findOrFail($id);

            return view('transparency.call-for-proposals.edit', compact('proposals'));
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while editing the Call for Proposal: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // Define validation rules for the incoming request data
        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $start_date = $request->input('start_date');

                    if ($value && strtotime($value) < strtotime($start_date)) {
                        $fail('The end date must be on or after the start date.');
                    }
                },
            ],
            'status' => [
                'nullable',
                'string',
                // function ($attribute, $value, $fail) use ($request) {
                //     $startDate = $request->input('start_date');
                //     $endDate = $request->input('end_date');

                //     // Check if the status is 'Open' if the current date is between start and end dates
                //     if ($value === 'Open' && now() >= $startDate && now() <= $endDate) {
                //         return;
                //     }

                //     // Check if the status is 'Closed' if the current date is past the end date
                //     if ($value === 'Closed' && now() > $endDate) {
                //         return;
                //     }

                //     // Check if the status is 'Opening Soon!' if the current date is before the start date
                //     if ($value === 'Opening Soon!' && now() < $startDate) {
                //         return;
                //     }

                //     $fail('Invalid status based on start and end dates.');
                // },
            ],
            'remarks' => 'nullable|string',
        ];

        // Define custom error messages
        $customMessages = [
            'start_date.after_or_equal' => 'The start date must be today or a future date.',
            'end_date.after' => 'The end date must be after the start date.',
        ];

        try {
            // Validate the request data against the defined rules
            $validatedData = $request->validate($rules, $customMessages);

            // Update the item with the provided ID using the validated data
            $proposals = CallForProposal::findOrFail($id);
            $proposals->update($validatedData);

            // Redirect to the index or show view, or perform other actions
            return redirect()->route('call-for-proposals')->with('success', 'Call for Proposal Successfully Updated!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update process
            // You can customize the error message based on the specific exception or database error.
            $errorMessage = 'Error updating the proposal: ' . $e->getMessage();

            // Redirect back with the error message
            return redirect()->back()->with('error', $errorMessage);
        }
    }


    public function destroy($id)
    {
        try {
            // Delete the item with the provided ID
            $proposals = CallForProposal::findOrFail($id);
            $proposals->delete();
    
            // Redirect to the index or perform other actions
            return redirect()->route('call-for-proposals')->with('success', 'Call for Proposal Successfully Deleted!');
        } catch (Exception $e) {
            // Handle the exception, you can log it for debugging or display an error message to the user.
            return back()->with('error', 'An error occurred while deleting the call for proposal: ' . $e->getMessage());
        }
    }
}
