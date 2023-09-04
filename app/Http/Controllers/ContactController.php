<?php

namespace App\Http\Controllers;
use App\Notifications\ContactMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUsModel;
use App\Mail\ContactMail;
use App\Models\UsersModel;

class ContactController extends Controller
{
    public function index()
    {
        $contact_messages = ContactUsModel::all();
        return view('contacts');
    }

    public function sendcontact(Request $req)
    {   
        $details = [
            'Name'=>$req->name,
            'Email'=>$req->email,
            'Subject'=>$req->subject,
            'Message'=>$req->message
        ];
        Mail::send(new ContactMail($details));
        return back()->with('message_sent','Message Sent!');
    }

    
    public function create()
    {
        // Return the view for creating a new item
        return view('contact');
    }

    public function store(Request $request)
    {
        $contactMessage = ContactUsModel::create($request->all());
    
        Mail::send('emails.contact', ['contactMessage' => $contactMessage], function ($message) use ($contactMessage) {
            $message->to('yurfavchi@gmail.com', 'AIRCoDe RPIM')
                ->subject('Subject: ' . $contactMessage->subject);
        });

        $director = UsersModel::where('role', true)->first();
        
        if ($director) {
            $director->notify(new ContactMessageNotification($contactMessage->id));
        }
    
        // Redirect to the index or show view, or perform other actions
        return view('contact')->with('contactMessage', $contactMessage);
    }
    
    public function show($id)
    {
        $contactMessage = ContactUsModel::findOrFail($id);
    
        return view('emails.contact', compact('contactMessage'));
    }
    

}
