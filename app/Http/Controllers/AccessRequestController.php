<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessRequestModel;

class AccessRequestController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = AccessRequestModel::all();
        $records = AccessRequestModel::orderBy('created_at', 'ASC')->get();

        return view('transparency.accessrequests.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.accessrequests.create');
    }

    public function store(Request $request)
    {
        AccessRequestModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('accessrequests')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $accessrequests = AccessRequestModel::findOrFail($id);

        return view('transparency.accessrequests.show', compact('accessrequests'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $accessrequests = AccessRequestModel::findOrFail($id);

        return view('transparency.accessrequests.edit', compact('accessrequests'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $accessrequests = AccessRequestModel::findOrFail($id);
        // Update the item properties using the request data
        $accessrequests->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('accessrequests')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $accessrequests = AccessRequestModel::findOrFail($id);
        $accessrequests->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('accessrequests')->with('success', 'Data Successfully Deleted!');
    }

}
