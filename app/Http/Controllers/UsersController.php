<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function getTotalUsers()
    {
        $totalUsers = UsersModel::count();

        return $totalUsers;
    }

    // public function showTotalUsers()
    // {
    //     $totalUsers = $this->getTotalUsers();

    //     return view('dashboard', ['totalUsers' => $totalUsers]);
    // }
    public function showTotalUsers()
    {
        $totalUsers = $this->getTotalUsers();

        return view('dashboard', compact('totalUsers'));
    }



    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = UsersModel::all();
        $records = UsersModel::orderBy('created_at', 'ASC')->get();

        return view('users.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('users.create');
    }

    public function store(Request $request)
    {
        UsersModel::create($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('users')->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $users = UsersModel::findOrFail($id);

        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $users = UsersModel::findOrFail($id);

        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $users = UsersModel::findOrFail($id);
        // Update the item properties using the request data
        $users->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('users')->with('success', 'Data Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $users = UsersModel::findOrFail($id);
        $users->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('users')->with('success', 'Data Successfully Deleted!');
    }
}
