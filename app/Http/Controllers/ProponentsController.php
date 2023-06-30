<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProponentsModel;

class ProponentsController extends Controller
{

    public function index()
    {
        $records = ProponentsModel::orderBy('created_at', 'ASC')->get();

        return view('proponents.admin-proponents.index', compact('records'));
    }

    public function create()
    {
        return view('proponents.admin-proponents.create');
    }

    public function store(Request $request)
    {   // Assuming you have a form field named 'content' that contains the user input

        $request->merge(['status' => 'New']);
        
        $this->validate($request, [
            'content' => 'required' // Adding validation rule to ensure 'content' is not empty
        ]);
        
        $proponent = ProponentsModel::create($request->all());
        
        // Other logic...
        
        return redirect()->route('proponents')->with('success', 'Data Successfully Added!');
        

    }

    public function show($id)
    {
        $proponents = ProponentsModel::findOrFail($id);

        return view('proponents.admin-proponents.show', compact('proponents'));
    }

    public function edit($id)
    {
        $proponents = ProponentsModel::findOrFail($id);

        return view('proponents.admin-proponents.edit', compact('proponents'));
    }

    public function update(Request $request, $id)
    {
        // Check if the user is an admin
        // if (auth()->user()->isAdmin()) {
            // Update the document status based on user input
            // $document->status = $request->input('status');
            // $document->save();
        // } else {
            // For regular users, only allow updating the content field
        //     $document->content = $request->input('content');
        //     $document->save();
        // }

            $proponent = ProponentsModel::find($id);
            $proponent->title = $request->input('title');
            $proponent->status = $request->input('status');
            $proponent->save();

            // return response()->json(['success' => true]);

        // Other logic...
    
        return redirect()->route('proponents')->with('success', 'Data Successfully Updated!');
      
    }

    public function destroy($id)
    {
        $proponents = ProponentsModel::findOrFail($id);
        $proponents->delete();

        return redirect()->route('proponents')->with('success', 'Data Successfully Deleted!');
    }
}
