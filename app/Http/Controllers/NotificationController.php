<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Notifications\ProjectNotification;
use App\Models\User;


class NotificationController extends Controller
{
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    
        return redirect()->back();
        // ->with('success', 'All notifications have been marked as read.')
    }
    
    public function markAsRead($notification)
    {
        // Find the notification by its ID and mark it as read.
        $notification = Auth::user()->notifications()->find($notification);
        
        if ($notification) {
            $notification->markAsRead();
        }

        // Redirect back to the URL specified in the notification data.
        return redirect($notification->data['action_url']);
    }
    
    // public function index()
    // {
    //     $notifications = auth()->user()->notifications;

    //     return view('notifications', compact('notifications'));
    // }
    
    // public function index()
    // {
    //     $notification = auth()->user()->notifications()->findOrFail($notificationId);
    //     $unreadNotifications = auth()->user()->unreadNotifications;
    //     $readNotifications = auth()->user()->readNotifications;

    //     return view('notifications', compact('unreadNotifications', 'readNotifications', 'notifications'));
    // }
    
    public function index()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        $readNotifications = auth()->user()->readNotifications;

        return view('notifications', compact('unreadNotifications', 'readNotifications'));
    }
    

    // public function markAllAsRead()
    // {
    //     Auth::user()->unreadNotifications->markAsRead();
    //     return redirect()->back();
    // }

    public function readNotifications()
    {
        $readNotifications = auth()->user()->readNotifications;

        return view('read_notifications', compact('readNotifications'));
    }

    // public function markAsRead($notificationId)
    // {
    //     $notification = auth()->user()->notifications()->findOrFail($notificationId);
    //     $notification->markAsRead();

    //     return redirect()->back()->with('success', 'Notification marked as read');
    // }

    public function showResearchProjectSubmission(Request $request, $projectId, $notificationId)
    {
    try {
        // Find the research project by its ID (assuming you have a ResearchProject model)
        $researchProject = ResearchProject::findOrFail($projectId);

        // Find the notification by its ID
        $notification = Auth::user()->notifications()->findOrFail($notificationId);

        if ($notification->unread()) {
            $notification->markAsRead();
        }

        // Load the view with the relevant data, including the researchProject
        return view('research.projects.show', compact('researchProject'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Research project or notification not found, you can customize the error message and view as needed
        return view('errors.notificationNotFound', ['message' => 'Research project or notification not found.']);
    }
   }

    
    // public function index()
    // {
    //     // Retrieve unread notifications and pass them to a view
    //     $notifications = auth()->user()->unreadNotifications;
    //     return view('notifications', compact('notifications'));
    // }
    // public function markAsRead($notificationId)
    // {
    //     // Mark a specific notification as read
    //     $notification = auth()->user()->notifications()->findOrFail($notificationId);
    //     $notification->markAsRead();
    
    //     // Count the remaining unread notifications
    //     $unreadNotificationCount = auth()->user()->unreadNotifications->count();
    
    //     return redirect()->back()->with('success', 'Notification marked as read')->with('unreadCount', $unreadNotificationCount);
    // }
    

    // Displaying read notifications
    // public function read()
    // {
    //     // Retrieve read notifications and pass them to the view
    //     $notifications = auth()->user()->readNotifications;
    //     return view('notifications.read', compact('notifications'));
    // }
    public function delete($notificationId)
    {
        // Find and delete a specific notification
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->delete();
        return redirect()->back()->with('success', 'Notification deleted');
    }

    
}
