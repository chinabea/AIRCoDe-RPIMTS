<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\UsersModel;

class ProjectNotification extends Notification
{
    use Queueable;
    private $projectId;

    /**
     * Create a new notification instance.
     */
    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Check if the notifiable is an admin (director)
        if ($notifiable instanceof UsersModel && $notifiable->isDirector()) {
            // Admin notification content
            return (new MailMessage)
                ->subject('New Research Project Submission')
                ->line('A new research project has been submitted.')
                ->line('Project Details:')
                ->line('Project ID: ' . $this->projectId)
                ->action('View Project', url('/projects/'.$this->projectId))
                ->line('You are receiving this notification as the director of the Research Project Information Management and Tracking System.');
        } 
        if ($notifiable instanceof UsersModel && $notifiable->isResearcher()) {
            // User notification content
            return (new MailMessage)
                ->subject('New Research Project Submission')
                ->line('Your research project submission has been successfully received.')
                ->line('Project Details:')
                ->line('Project ID: ' . $this->projectId)
                ->action('View Project', url('/projects/'.$this->projectId))
                ->line('Thank you for using the Research Project Information Management and Tracking System.');
        }
    }
   
    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'subject' => 'New Research Project Submission',
    //         'icon' => 'fa-solid fa-circle-check fa-lg text-white',
    //         'message' => 'A new research project has been submitted.',
    //         'project_id' => $this->projectId,
    //         'link' => url('/projects/' . $this->projectId),
    //         'action_url' => 'icon-circle bg-gradient-sucess',
    //         'type' => 'project_submission',
    //     ];
    // }

    public function toDatabase($notifiable)
    {
        // Check if the notifiable is an admin (director)
        if ($notifiable->isDirector()) {
            // Admin notification content
            return [
                'subject' => 'New Research Project Submission',
                'message' => 'A new research project has been submitted.',
                'project_id' => $this->projectId,
                'link' => url('/projects/' . $this->projectId),
                'role' => 'director',
            ];
        } elseif ($notifiable->isResearcher()) {
            // User notification content
            return [
                'subject' => 'New Research Project Submission',
                'message' => 'Your research project submission has been successfully received.',
                'project_id' => $this->projectId,
                'link' => url('/projects/' . $this->projectId),
                'role' => 'researcher',
            ];
        }

        return null; // Return null if notifiable is not an admin or researcher
    }
 
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
