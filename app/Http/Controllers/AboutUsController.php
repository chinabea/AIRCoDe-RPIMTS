<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUsModel;

class AboutUsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = AboutUsModel::all();
        $records = AboutUsModel::orderBy('created_at', 'DESC')->get();

        return view('transparency.aboutus.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.aboutus.create');
    }

    public function store(Request $request)
    {
        AboutUsModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('abouts')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $aboutus = AboutUsModel::findOrFail($id);

        return view('transparency.aboutus.show', compact('aboutus'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $aboutus = AboutUsModel::findOrFail($id);

        return view('transparency.aboutus.edit', compact('aboutus'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $aboutus = AboutUsModel::findOrFail($id);
        // Update the item properties using the request data
        $aboutus->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('abouts')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $aboutus = AboutUsModel::findOrFail($id);
        $aboutus->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('abouts')->with('success', 'Data Successfully Deleted!');
    }


}
