<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Notifications\EmailNotification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function sendNotification()
    // {

    //     $user=User::all();

    //     $details=[

    //         'greeting'=>'Hi Lav Developer',

    //         'body'=>'Hi Lav Body',

    //         'actiontext'=>'Click the link to view Project',

    //         'actionurl'=>'/',

    //         'lastline'=>'this is the last line',

    //     ];

    //     Notification::send($user, new EmailNotification($details));

    //     dd('done');

    // }
}
