<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnouncementsModel;

class AnnouncementsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = AnnouncementsModel::all();
        $records = AnnouncementsModel::orderBy('created_at', 'ASC')->get();

        return view('transparency.announcements.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.announcements.create');
    }

    public function store(Request $request)
    {
        AnnouncementsModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('announcements')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $announcements = AnnouncementsModel::findOrFail($id);

        return view('transparency.announcements.show', compact('announcements'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $announcements = AnnouncementsModel::findOrFail($id);

        return view('transparency.announcements.edit', compact('announcements'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $announcements = AnnouncementsModel::findOrFail($id);
        // Update the item properties using the request data
        $announcements->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('announcements')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $announcements = AnnouncementsModel::findOrFail($id);
        $announcements->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('announcements')->with('success', 'Data Successfully Deleted!');
    }
}
