<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Conversation;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    
    // public function deleteSelected(Request $request)
    // {
    //     $selectedConversations = $request->input('selected_conversations');
    
    //     // Assuming 'conversation_id' is the foreign key in the messages table
    //     Message::whereIn('conversation_id', $selectedConversations)->delete();
    
    //     return response()->json(['message' => 'Selected conversations deleted successfully']);
    // }

    public function deleteSelected(Request $request)
    {
        $selectedConversations = $request->input('selected_conversations');

        // Assuming your Message model has a method to delete by conversation_number
        Message::whereIn('conversation_number', $selectedConversations)->delete();

        return response()->json(['message' => 'Conversations deleted successfully']);
    }


    public function show($id)
    {
        $user = auth()->user(); // Get the authenticated user
        $messages = Message::where('recipient_id', $user->id)->get();
        $message = Message::findOrFail($id);

        $conversations = Message::where(function ($query) use ($message) {
            $query->where('sender_id', $message->sender_id)
                ->where('recipient_id', $message->recipient_id);
        })->orWhere(function ($query) use ($message) {
            $query->where('sender_id', $message->recipient_id)
                ->where('recipient_id', $message->sender_id);
        })->orderBy('created_at', 'asc')->get();

        $mymessages = Message::all();

        return view('messages.read-mail', compact('conversations', 'message', 'messages', 'mymessages'))->with('success', 'Sent');
    }

    // public function index()
    // {
    //     // Retrieve messages from the database and display them in the inbox view
    //     $user = auth()->user(); // Get the authenticated user

    //     // Fetch the last message of each conversation with the same sender and recipient
    //     $conversations = Message::whereIn('id', function ($query) use ($user) {
    //         $query->selectRaw('MAX(id)')
    //             ->from('messages')
    //             ->where('recipient_id', $user->id)
    //             ->orWhere('sender_id', $user->id)
    //             ->groupBy(['sender_id', 'recipient_id']);
    //     })->orderBy('created_at', 'asc')->get();

    //     return view('messages.mailbox', compact('conversations'))->with('success', 'Message sent successfully!');
    // }

    public function index()
    {
        try {
            // Retrieve messages from the database and display them in the inbox view
            $user = auth()->user(); // Get the authenticated user

            // Fetch the last message of each conversation with the same sender and recipient
            $conversations = Message::whereIn('id', function ($query) use ($user) {
                $query->selectRaw('MAX(id)')
                    ->from('messages')
                    ->where('recipient_id', $user->id)
                    ->orWhere('sender_id', $user->id)
                    ->groupBy(['sender_id', 'recipient_id']);
            })->orderBy('created_at', 'asc')->get();

            return view('messages.mailbox', compact('conversations'))->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            // Handle the exception, you might want to log it or display an error page
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }


    // public function index()
    // {
    //     $user = auth()->user();
    //     $conversations = Message::whereIn('id', function ($query) use ($user) {
    //         $query->selectRaw('MAX(id) as id')
    //             ->from('messages')
    //             ->where('recipient_id', $user->id)
    //             ->orWhere('sender_id', $user->id)
    //             ->groupBy(['sender_id', 'recipient_id']);
    //     })->get();

    //     return view('messages.mailbox', compact('conversations'))->with('success', 'Message sent successfully!');
    // }



    public function create()
    {
        // Display a form for composing a new message
        $user = auth()->user(); // Get the authenticated user
        $users = User::all(); // Get all users
        $messages = Message::where('recipient_id', $user->id)->orderBy('created_at', 'desc')->get();

        // show all messages
        $mymessages = Message::all();
        
        // Get all messages
        $allMessages = Message::orderBy('created_at', 'desc')->get();

        return view('messages.compose', compact('users','messages','mymessages','allMessages'))->with('success', 'Sent');
    }

    // public function reply(Request $request)
    // {
    //     // dd($request->all());
    //     try {
    //         // Handle the logic for sending a new message
    //         $user = auth()->user(); // Get the authenticated user

    //         // Validate the request
    //         $request->validate([
    //             'recipient_id' => 'required|exists:users,id',
    //             'subject' => 'required',
    //             'content' => 'required',
    //         ]);

    //         // Check if the recipient is the same as the authenticated user
    //         if ($request->input('recipient_id') == $user->id) {
    //             return redirect()->back()->with('error', 'You cannot send a message to yourself.');
    //         }

    //         // Create a new message
    //         Message::create([
    //             'sender_id' => $user->id,
    //             'recipient_id' => $request->input('recipient_id'),
    //             'subject' => $request->input('subject'),
    //             'content' => $request->input('content'),
    //             // Add any other fields as needed
    //         ]);

    //         $conversations = Message::whereIn('id', function ($query) use ($user) {
    //             $query->selectRaw('MAX(id)')
    //                 ->from('messages')
    //                 ->where('recipient_id', $user->id)
    //                 ->orWhere('sender_id', $user->id)
    //                 ->groupBy(['sender_id', 'recipient_id']);
    //         })->orderBy('created_at', 'asc')->get();

    //         return redirect()->route('messages.mailbox')->with('success', 'Message sent successfully!');
    //         // return view('messages.mailbox', compact('conversations'))->with('success', 'Message sent successfully!');
    //     } catch (\Exception $e) {
    //         // Handle the exception, you might want to log it or display an error page
    //         return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
    //     }
    // }

    public function reply(Request $request)
    {
        try {
            $user = auth()->user(); // Get the authenticated user

            // Validate the request
            $request->validate([
                'recipient_id' => 'required|exists:users,id',
                'subject' => 'required',
                'content' => 'required',
            ]);

            // Check if the recipient is the same as the authenticated user
            if ($request->input('recipient_id') == $user->id) {
                return redirect()->back()->with('error', 'You cannot send a message to yourself.');
            }

            // Find or create a conversation
            $conversation = Message::where(function ($query) use ($user, $request) {
                $query->where('sender_id', $user->id)
                    ->where('recipient_id', $request->input('recipient_id'));
            })->orWhere(function ($query) use ($user, $request) {
                $query->where('recipient_id', $user->id)
                    ->where('sender_id', $request->input('recipient_id'));
            })->first();

            if (!$conversation) {
                return redirect()->back()->with('error', 'Conversation not found.');
            }

            // Create a new message within the conversation
            $conversation->messages()->create([
                'sender_id' => $user->id,
                'recipient_id' => $request->input('recipient_id'),
                'subject' => $request->input('subject'),
                'content' => $request->input('content'),
            ]);

            $conversations = Message::whereIn('id', function ($query) use ($user) {
                $query->selectRaw('MAX(id)')
                    ->from('messages')
                    ->where('recipient_id', $user->id)
                    ->orWhere('sender_id', $user->id)
                    ->groupBy(['sender_id', 'recipient_id']);
            })->orderBy('created_at', 'asc')->get();

            return redirect()->route('messages.mailbox')->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }



    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     try {
    //         // Handle the logic for sending a new message
    //         $user = auth()->user(); // Get the authenticated user
    //         // $messages = Message::where('recipient_id', $user->id)->get();
            
    //         // Validate the request
    //         $request->validate([
    //             'recipient_id' => 'required|exists:users,id',
    //             'subject' => 'required',
    //             'content' => 'required',
    //         ]);

    //         // Create a new message
    //         Message::create([
    //             'sender_id' => $user->id,
    //             'recipient_id' => $request->input('recipient_id'),
    //             'subject' => $request->input('subject'),
    //             'content' => $request->input('content'),
    //             // Add any other fields as needed
    //         ]);
            
    //         $conversations = Message::whereIn('id', function ($query) use ($user) {
    //             $query->selectRaw('MAX(id)')
    //                 ->from('messages')
    //                 ->where('recipient_id', $user->id)
    //                 ->orWhere('sender_id', $user->id)
    //                 ->groupBy(['sender_id', 'recipient_id']);
    //         })->orderBy('created_at', 'asc')->get();

    //         // return view('messages.mailbox', compact('conversations'))->with('success', 'Message sent successfully!');
            
    //         return redirect()->route('messages.mailbox')->with('success', 'Message sent successfully!');
    //     } catch (\Exception $e) {
    //         // Handle the exception, you might want to log it or display an error page
    //         return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
    //     }

    // }
    

    // public function store(Request $request)
    // {
    //     try {
    //         $user = auth()->user();
    
    //         $request->validate([
    //             'recipient_id' => 'required|exists:users,id',
    //             'subject' => 'required',
    //             'content' => 'required',
    //         ]);
    
    //         // Find or create a conversation
    //         $conversation = Message::where(function ($query) use ($user, $request) {
    //             $query->where('sender_id', $user->id)
    //                 ->where('recipient_id', $request->input('recipient_id'));
    //         })->orWhere(function ($query) use ($user, $request) {
    //             $query->where('recipient_id', $user->id)
    //                 ->where('sender_id', $request->input('recipient_id'));
    //         })->first();
    
    //         if (!$conversation) {
    //             // If no conversation exists, create a new conversation
    //             $maxConversationNumber = Message::where('sender_id', $user->id)
    //                 ->orWhere('recipient_id', $user->id)
    //                 ->max('conversation_number') + 1;
    
    //             // $conversation = Message::create([
    //             //     'conversation_number' => $maxConversationNumber,
    //             //     'sender_id' => $user->id,
    //             //     'recipient_id' => $request->input('recipient_id'),
    //             // ]);

    //             $conversation->messages()->create([
    //               'conversation_number' => $maxConversationNumber, // Ensure conversation_number is provided
    //               'sender_id' => $user->id,
    //               'recipient_id' => $request->input('recipient_id'),
    //               'subject' => $request->input('subject'),
    //               'content' => $request->input('content'),
    //           ]);
    //         }
    
    //         // Create a new message within the conversation
    //         $conversation->messages()->create([
    //             'conversation_number' => $conversation->conversation_number, // Ensure conversation_number is provided
    //             'sender_id' => $user->id,
    //             'recipient_id' => $request->input('recipient_id'),
    //             'subject' => $request->input('subject'),
    //             'content' => $request->input('content'),
    //         ]);
    
    //         // Retrieve conversations
    //         $conversations = Message::whereIn('id', function ($query) use ($user) {
    //             $query->selectRaw('MAX(id)')
    //                 ->from('messages')
    //                 ->where('recipient_id', $user->id)
    //                 ->orWhere('sender_id', $user->id)
    //                 ->groupBy(['sender_id', 'recipient_id']);
    //         })->orderBy('created_at', 'asc')->get();
    
    //         return redirect()->route('messages.mailbox')->with('success', 'Message sent successfully!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
    //     }
    // }
    public function store(Request $request)
    {
      
        // dd($request->all());
        try {
            $user = auth()->user();
    
            $request->validate([
                'recipient_id' => 'required|exists:users,id',
                'subject' => 'required',
                'content' => 'required',
            ]);
    
            // Find or create a conversation
            $conversation = Message::where(function ($query) use ($user, $request) {
                $query->where('sender_id', $user->id)
                    ->where('recipient_id', $request->input('recipient_id'));
            })->orWhere(function ($query) use ($user, $request) {
                $query->where('recipient_id', $user->id)
                    ->where('sender_id', $request->input('recipient_id'));
            })->first();
    
            if (!$conversation) {
                // If no conversation exists, create a new conversation with an automatically generated conversation number
                $maxConversationNumber = Message::max('conversation_number') + 1;
    
                $conversation = Message::create([
                    'conversation_number' => $maxConversationNumber,
                    'sender_id' => $user->id,
                    'recipient_id' => $request->input('recipient_id'),
                    'subject' => $request->input('subject'),
                    'content' => $request->input('content'),
                ]);
            }
    
            // Retrieve conversations
            $conversations = Message::whereIn('id', function ($query) use ($user) {
                $query->selectRaw('MAX(id)')
                    ->from('messages')
                    ->where('recipient_id', $user->id)
                    ->orWhere('sender_id', $user->id)
                    ->groupBy(['sender_id', 'recipient_id']);
            })->orderBy('created_at', 'asc')->get();
    
            return redirect()->route('messages.mailbox')->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
    
    
    
    

    


    
// public function create()
// {
//     try {
//         // Display a form for composing a new message
//         $user = auth()->user(); // Get the authenticated user
//         $users = User::all(); // Get all users
//         $messages = Message::where('recipient_id', $user->id)->orderBy('created_at', 'desc')->get();

//         // show all messages
//         $mymessages = Message::all();
        
//         // Get all messages
//         $allMessages = Message::orderBy('created_at', 'desc')->get();

//         return view('messages.compose', compact('users', 'messages', 'mymessages', 'allMessages'))->with('success', 'Sent');
//     } catch (\Exception $e) {
//         // Handle the exception, you might want to log it or display an error page
//         return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
//     }
// }

// public function store(Request $request)
// {
//     try {
//         // Handle the logic for sending a new message
//         $user = auth()->user(); // Get the authenticated user
        
//         // Validate the request
//         $request->validate([
//             'subject' => 'required',
//             'recipient_id' => 'required|exists:users,id',
//             'content' => 'required',
//         ]);

//         // Create a new message
//         Message::create([
//             'sender_id' => $user->id,
//             'recipient_id' => $request->input('recipient_id'),
//             'subject' => $request->input('subject'),
//             'content' => $request->input('content'),
//             // Add any other fields as needed
//         ]);

//         // Redirect back with a success message or handle the response as needed
//         return redirect()->back()->with('success', 'Message sent successfully!');
//     } catch (ValidationException $e) {
//         // Handle validation exception
//         return redirect()->back()->withErrors($e->errors())->withInput();
//     } catch (QueryException $e) {
//         // Handle database query exception
//         return redirect()->back()->with('error', 'Error saving message to the database.');
//     } catch (\Exception $e) {
//         // Handle other exceptions
//         return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
//     }
// }


    // public function store(Request $request)
    // {
    //     // Handle the logic for sending a new message
    //     $user = auth()->user(); // Get the authenticated user

    //     $validatedData = $request->validate([
    //         'recipient_id' => 'required|exists:users,id',
    //         'content' => 'required',
    //     ]);

    //     // Find an existing message with the same recipient
    //     $existingMessage = Message::where('sender_id', $user->id)
    //         ->where('recipient_id', $validatedData['recipient_id'])
    //         ->first();

    //     if ($existingMessage) {
    //         // Update the existing message with the new content
    //         $existingMessage->update(['content' => $validatedData['content']]);
    //     } else {
    //         // Create a new message
    //         $message = new Message;
    //         $message->sender_id = $user->id;
    //         $message->recipient_id = $validatedData['recipient_id'];
    //         $message->content = $validatedData['content'];
    //         $message->save();
    //     }

    //     // Redirect back with a success message or handle the response as needed
    //     return redirect()->back()->compact('records')->with('success', 'Message sent successfully!');
    // }


    // public function show($id)
    // {
    //     // Display the content of a specific message
    //     $message = Message::findOrFail($id);

    //     // Add authorization logic to ensure the user can view this message
    //     // Display a form for composing a new message
    //     $user = auth()->user(); // Get the authenticated user
    //     $users = User::all(); // Get all users
    //     $messages = Message::where('recipient_id', $user->id)->orderBy('created_at', 'desc')->get();

    //     // show all messages
    //     $mymessages = Message::all();

    //     // Get all messages
    //     $ascMessages = Message::orderBy('created_at', 'asc')->get();
    //     $descMessages = Message::orderBy('created_at', 'desc')->get();

    //     return view('messages.create', compact('message','users','messages','mymessages','ascMessages','descMessages'));
    // }























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
