<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProposalsModel;

class ProposalsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = ProposalsModel::all();
        $records = ProposalsModel::orderBy('created_at', 'ASC')->get();

        return view('transparency.call-for-proposals.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.call-for-proposals.create');
    }

    public function store(Request $request)
    {
        ProposalsModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('call-for-proposals')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $proposals = ProposalsModel::findOrFail($id);

        return view('transparency.call-for-proposals.show', compact('proposals'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $proposals = ProposalsModel::findOrFail($id);

        return view('transparency.call-for-proposals.edit', compact('proposals'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $proposals = ProposalsModel::findOrFail($id);
        // Update the item properties using the request data
        $proposals->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('call-for-proposals')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $proposals = ProposalsModel::findOrFail($id);
        $proposals->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('call-for-proposals')->with('success', 'Data Successfully Deleted!');
    }
}
