<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{

    public function index()
    {
        // Retrieve messages from the database and display them in the inbox view
        $user = auth()->user(); // Get the authenticated user
        $users = User::all(); // Get all users
        $messages = Message::where('recipient_id', $user->id)->get();

        // show all messages
        $mymessages = Message::all();

        return view('messages.index', compact('messages','mymessages','users'))->with('success', 'Sent');
    }

    public function create()
    {
        // Display a form for composing a new message
        $user = auth()->user(); // Get the authenticated user
        $users = User::all(); // Get all users
        $messages = Message::where('recipient_id', $user->id)->orderBy('created_at', 'desc')->get();

        // show all messages
        $mymessages = Message::all();


        // Get all messages
        // Get all messages
        $allMessages = Message::orderBy('created_at', 'desc')->get();

        return view('messages.create', compact('users','messages','mymessages','allMessages'))->with('success', 'Sent');
    }

    // public function store(Request $request)
    // {
    //     // Handle the logic for sending a new message
    //     $user = auth()->user(); // Get the authenticated user

    //     $validatedData = $request->validate([
    //         'recipient_id' => 'required|exists:users,id',
    //         'content' => 'required',
    //     ]);

    //     // Create a new message
    //     $message = new Message;
    //     $message->sender_id = $user->id;
    //     $message->recipient_id = $validatedData['recipient_id'];
    //     $message->content = $validatedData['content'];
    //     $message->save();

    //     // Redirect back with a success message or handle the response as needed
    //     return redirect()->back()->with('success', 'Message sent successfully!');
    // }
    public function store(Request $request)
    {
        // Handle the logic for sending a new message
        $user = auth()->user(); // Get the authenticated user

        $validatedData = $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required',
        ]);

        // Find an existing message with the same recipient
        $existingMessage = Message::where('sender_id', $user->id)
            ->where('recipient_id', $validatedData['recipient_id'])
            ->first();

        if ($existingMessage) {
            // Update the existing message with the new content
            $existingMessage->update(['content' => $validatedData['content']]);
        } else {
            // Create a new message
            $message = new Message;
            $message->sender_id = $user->id;
            $message->recipient_id = $validatedData['recipient_id'];
            $message->content = $validatedData['content'];
            $message->save();
        }

        // Redirect back with a success message or handle the response as needed
        return redirect()->back()->with('success', 'Message sent successfully!');
    }


    public function show($id)
    {
        // Display the content of a specific message
        $message = Message::findOrFail($id);

        // Add authorization logic to ensure the user can view this message
        // Display a form for composing a new message
        $user = auth()->user(); // Get the authenticated user
        $users = User::all(); // Get all users
        $messages = Message::where('recipient_id', $user->id)->orderBy('created_at', 'desc')->get();

        // show all messages
        $mymessages = Message::all();

        // Get all messages
        $ascMessages = Message::orderBy('created_at', 'asc')->get();
        $descMessages = Message::orderBy('created_at', 'desc')->get();

        return view('messages.create', compact('message','users','messages','mymessages','ascMessages','descMessages'));
    }























    // public function index()
    // {
    //     // Display a list of messages
    //     $messages = Message::all();
    //     return view('messages.index', ['messages' => $messages]);
    // }

    // public function create()
    // {
    //     // Show a form to create a new message (if needed)
    //     return view('messages.create');
    // }

    // public function store(Request $request)
    // {
    //     // Store a new message
    //     $message = new Message();
    //     $message->content = $request->input('content');
    //     $message->save();

    //     // Redirect or return a response as needed
    //     return redirect()->route('messages.index');
    // }

    // public function show(Message $message)
    // {
    //     // Display a specific message
    //     return view('messages.show', ['message' => $message]);
    // }

    // public function update(Request $request, Message $message)
    // {
    //     // Update an existing message
    //     $message->content = $request->input('content');
    //     $message->save();

    //     // Redirect or return a response as needed
    //     return redirect()->route('messages.show', ['message' => $message]);
    // }

    // public function destroy(Message $message)
    // {
    //     // Delete a message
    //     $message->delete();

    //     // Redirect or return a response as needed
    //     return redirect()->route('messages.index');
    // }

}
