<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUsModel;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
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
    
        // Redirect to the index or show view, or perform other actions
        return view('contact')->with('contactMessage', $contactMessage);
    }
    
    public function show($id)
    {
        $contactMessage = ContactUsModel::findOrFail($id);
    
        return view('emails.contact', compact('contactMessage'));
    }
    

}
