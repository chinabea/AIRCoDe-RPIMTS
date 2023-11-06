<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
//     public function getTotalUsers()
//     {
//         $totalUsers = User::count();

//         return $totalUsers;
//     }

//     public function showTotalUsers()
//     {
//         $totalUsers = $this->getTotalUsers();

//         return view('dashboard', compact('totalUsers'));
//     }

//     public function index()
//     {
//         // Fetch all records from the model and pass them to the view
//         // $items = User::all();
//         $records = User::orderBy('created_at', 'ASC')->get();

//         return view('users.index', compact('records'));
//     }

//     public function create()
//     {
//         // Return the view for creating a new item
//         return view('users.create');
//     }

//     public function store(Request $request)
//     {
//         User::create($request->all());

//         // Redirect to the index or show view, or perform other actions
//         return redirect()->route('users')->with('success', 'Users Successfully Added!');
//     }

//     public function show($id)
//     {
//         // Retrieve and show the specific item using the provided ID
//         $users = User::findOrFail($id);

//         return view('users.show', compact('users'));
//     }

//     public function edit($id)
//     {
//         // Retrieve and show the specific item for editing
//         $users = User::findOrFail($id);

//         return view('users.edit', compact('users'));
//     }

//     public function update(Request $request, $id)
//     {
//         // Validate and update the item with the provided ID
//         $users = User::findOrFail($id);
//         // Update the item properties using the request data
//         $users->update($request->all());

//         // Redirect to the index or show view, or perform other actions
//         return redirect()->route('users')->with('success', 'User Successfully Updated!');
//     }

//     public function destroy($id)
//     {
//         // Delete the item with the provided ID
//         $users = User::findOrFail($id);
//         $users->delete();

//         // Redirect to the index or perform other actions
//         return redirect()->route('users')->with('success', 'User Successfully Deleted!');
//     }


    public function getTotalUsers()
    {
        try {
            $totalUsers = User::count();
            return $totalUsers;
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function showTotalUsers()
    {
        try {
            $totalUsers = $this->getTotalUsers();
            return view('dashboard', compact('totalUsers'));
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function index()
    {
        try {
            // Fetch all records from the model and pass them to the view
            // $items = User::all();
            $records = User::orderBy('created_at', 'ASC')->get();
            return view('users.index', compact('records'));
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function create()
    {
        try {
            // Return the view for creating a new item
            return view('users.create');
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            User::create($request->all());

            // Redirect to the index or show view, or perform other actions
            return redirect()->route('users')->with('success', 'Users Successfully Added!');
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        try {
            // Retrieve and show the specific item using the provided ID
            $users = User::findOrFail($id);
            return view('users.show', compact('users'));
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try {
            // Retrieve and show the specific item for editing
            $users = User::findOrFail($id);
            return view('users.edit', compact('users'));
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate and update the item with the provided ID
            $users = User::findOrFail($id);
            // Update the item properties using the request data
            $users->update($request->all());

            // Redirect to the index or show view, or perform other actions
            return redirect()->route('users')->with('success', 'User Successfully Updated!');
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            // Delete the item with the provided ID
            $users = User::findOrFail($id);
            $users->delete();

            // Redirect to the index or perform other actions
            return redirect()->route('users')->with('success', 'User Successfully Deleted!');
        } catch (Exception $e) {
            // Handle the exception here, you can log it or return an error response
            return $e->getMessage();
        }
    }
}
