<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewsModel;

class ReviewsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = ReviewsModel::all();
        $records = ReviewsModel::orderBy('created_at', 'ASC')->get();

        return view('reviews.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        ReviewsModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('reviews')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $reviews = ReviewsModel::findOrFail($id);

        return view('reviews.show', compact('reviews'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $reviews = ReviewsModel::findOrFail($id);

        return view('reviews.edit', compact('reviews'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $reviews = ReviewsModel::findOrFail($id);
        // Update the item properties using the request data
        $reviews->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('reviews')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $reviews = ReviewsModel::findOrFail($id);
        $reviews->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('reviews')->with('success', 'Data Successfully Deleted!');
    }
}
