<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function compose()
    {
        $user = auth()->user(); // Get the authenticated user
        // $messages = Message::where('recipient_id', $user->id)->get();

        return view('messages.compose-message');
    }
    // Method to display the user's inbox
    public function index()
    {
        $user = auth()->user(); // Get the authenticated user
        $messages = Message::where('recipient_id', $user->id)->get();

        return view('messages.index', compact('messages'));
    }

    // Method to send a new message
    public function store(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        $validatedData = $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required',
        ]);

        // Create a new message
        $message = new Message;
        $message->sender_id = $user->id;
        $message->recipient_id = $validatedData['recipient_id'];
        $message->content = $validatedData['content'];
        $message->save();

        // Redirect back with a success message or handle the response as needed
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    // Method to view a specific message
    public function show($id)
    {
        $message = Message::findOrFail($id);

        // Add authorization logic to ensure the user can view this message

        return view('messages.show', compact('message'));
    }
}
