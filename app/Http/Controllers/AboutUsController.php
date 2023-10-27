<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = AboutUs::all();
        $records = AboutUs::orderBy('created_at', 'DESC')->get();

        return view('transparency.aboutus.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.aboutus.create');
    }

    public function store(Request $request)
    {
        AboutUs::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('abouts')->with('success', 'Abouts Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $aboutus = AboutUs::findOrFail($id);

        return view('transparency.aboutus.show', compact('aboutus'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $aboutus = AboutUs::findOrFail($id);

        return view('transparency.aboutus.edit', compact('aboutus'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $aboutus = AboutUs::findOrFail($id);
        // Update the item properties using the request data
        $aboutus->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('abouts')->with('success', 'Abouts Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $aboutus = AboutUs::findOrFail($id);
        $aboutus->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('abouts')->with('success', 'Abouts Successfully Deleted!');
    }


}
