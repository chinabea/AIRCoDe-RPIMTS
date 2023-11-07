<?php

namespace App\Http\Controllers;
use Illuminate\Mail\Mailable;
use App\Notifications\ContactMessageNotification;
// use Illuminate\Support\Facades\Notification;
// use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Mail\ContactMail;
use App\Models\User;

class ContactController extends Controller
{
//     public function index()
//     {
//         $contact_messages = ContactMessage::all();
//         return view('contacts');
//     }

//     public function sendcontact(Request $req)
//     {
//         $details = [
//             'Name'=>$req->name,
//             'Email'=>$req->email,
//             'Subject'=>$req->subject,
//             'Message'=>$req->message
//         ];
//         Mail::send(new ContactMail($details));
//         return back()->with('message_sent','Message Sent!');
//     }


//     public function create()
//     {
//         // Return the view for creating a new item
//         return view('contact');
//     }

//     public function store(Request $request)
//     {
//         $contactMessage = ContactMessage::create($request->all());

//         Mail::send('emails.contact', ['contactMessage' => $contactMessage], function ($message) use ($contactMessage) {
//             $message->to('yurfavchi@gmail.com', 'RPIMTS')
//                 ->subject('Subject: ' . $contactMessage->subject);
//         });

//         $director = User::where('role', true)->first();

//         if ($director) {
//             $director->notify(new ContactMessageNotification($contactMessage->id));
//         }

//         // Redirect to the index or show view, or perform other actions
//         return view('contact')->with('contactMessage', $contactMessage);
//     }

//     public function show($id)
//     {
//         $contactMessage = ContactMessage::findOrFail($id);

//         return view('emails.contact', compact('contactMessage'));
//     }


    public function index()
    {
        try {
            $contact_messages = ContactMessage::all();
            return view('contacts');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function sendcontact(Request $req)
    {
        try {
            $details = [
                'Name' => $req->name,
                'Email' => $req->email,
                'Subject' => $req->subject,
                'Message' => $req->message,
            ];
            Mail::send(new ContactMail($details));
            return back()->with('message_sent', 'Message Sent!');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('contact');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $contactMessage = ContactMessage::create($request->all());

            Mail::send('emails.contact', ['contactMessage' => $contactMessage], function ($message) use ($contactMessage) {
                $message->to('yurfavchi@gmail.com', 'RPIMTS')
                    ->subject('Subject: ' . $contactMessage->subject);
            });

            $director = User::where('role', true)->first();

            if ($director) {
                $director->notify(new ContactMessageNotification($contactMessage->id));
            }

            return view('contact')->with('contactMessage', $contactMessage);
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $contactMessage = ContactMessage::findOrFail($id);
            return view('emails.contact', compact('contactMessage'));
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
