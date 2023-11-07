<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Response;
// use App\Notifications\ProjectNotification;
// use App\Models\User;


class NotificationController extends Controller
{
    public function markAllAsRead()
    {
        try {
            Auth::user()->unreadNotifications->markAsRead();
            return redirect()->back()->with('success', 'All notifications have been marked as read.');
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error or provide an error message
            return redirect()->back()->with('error', 'An error occurred while marking notifications as read.');
        }
    }

    public function markAsRead($notification)
    {
        try {
            // Find the notification by its ID and mark it as read.
            $notification = Auth::user()->notifications()->find($notification);

            if ($notification) {
                $notification->markAsRead();
            } else {
                // Handle the case where the notification is not found
                return redirect()->back()->with('error', 'Notification not found');
            }

            // Redirect back to the URL specified in the notification data.
            return redirect($notification->data['action_url']);
        } catch (\Exception $e) {
            // Handle other exceptions (e.g., database errors) here
            return redirect()->back()->with('error', 'An error occurred while marking the notification as read');
        }
    }

    public function index()
    {
        try {
            $unreadNotifications = auth()->user()->unreadNotifications;
            $readNotifications = auth()->user()->readNotifications;

            return view('notifications', compact('unreadNotifications', 'readNotifications'));
        } catch (\Exception $e) {
            // Handle the exception, such as logging or returning an error response
            return view('error')->with('message', 'An error occurred while fetching notifications.');
        }
    }

    public function readNotifications()
    {
        try {
            $readNotifications = auth()->user()->readNotifications;

            return view('read_notifications', compact('readNotifications'));
        } catch (\Exception $e) {
            // Handle the exception, you can log it or return an error view with a message
            return view('error', ['message' => 'An error occurred while retrieving read notifications.']);
        }
    }


    public function showResearchProjectSubmission(Request $request, $projectId, $notification)
    {
    try {
        // Find the research project by its ID (assuming you have a ResearchProject model)
        $researchProject = ResearchProject::findOrFail($projectId);

        // Find the notification by its ID
        $notification = Auth::user()->notifications()->findOrFail($notification);

        if ($notification->unread()) {
            $notification->markAsRead();
        }

        // Load the view with the relevant data, including the researchProject
        return view('research.projects.show', compact('researchProject'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Research project or notification not found, you can customize the error message and view as needed
        return view('error', ['message' => 'Research project or notification not found.']);
    }
   }

    public function delete($notification)
    {
        try {
            // Find and delete a specific notification
            $notification = auth()->user()->notifications()->findOrFail($notification);
            $notification->delete();
            return redirect()->back()->with('success', 'Notification deleted');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the notification is not found
            return redirect()->back()->with('error', 'Notification not found');
        }
    }

}
