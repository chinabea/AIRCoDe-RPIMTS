<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Conversation;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

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

    public function index()
    {
        try {
            // Retrieve messages from the database and display them in the inbox view
            $user = auth()->user(); // Get the authenticated user

            $conversations = Message::select('conversation_number', DB::raw('MAX(id) as max_id'))
                ->whereIn('id', function ($query) use ($user) {
                    $query->selectRaw('MAX(id)')
                        ->from('messages')
                        ->where('recipient_id', $user->id)
                        ->groupBy(['sender_id', 'recipient_id']);

                    $query->union(
                        Message::selectRaw('MAX(id)')
                            ->where('sender_id', $user->id)
                            ->groupBy(['sender_id', 'recipient_id'])
                    );
                })
                ->groupBy('conversation_number')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('messages.mailbox', compact('conversations'))->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            // Handle the exception, you might want to log it or display an error page
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
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
        $allMessages = Message::orderBy('created_at', 'desc')->get();

        return view('messages.compose', compact('users', 'messages', 'mymessages', 'allMessages'))->with('success', 'Sent');
    }

    public function reply(Request $request)
    {
        // try {
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
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        // }
    }

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
}
