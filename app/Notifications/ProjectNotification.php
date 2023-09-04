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
    private $researcherId;
    private $researcherMail;
    private $projectTitle;

    /**
     * Create a new notification instance.
     */
    public function __construct($projectId, $researcherId, $researcherMail, $projectTitle)
    {
        $this->projectId = $projectId;
        $this->researcherId = $researcherId;
        $this->researcherMail = $researcherMail;
        $this->projectTitle = $projectTitle;
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
            ->greeting('Dear Director,')
            ->line('A new research project has been submitted.')
            ->line('Here are the Project Details:')
            ->line('Researcher ID: ' . $this->researcherId)
            ->line('Researcher Email: ' . $this->researcherMail)
            ->line('Project ID: ' . $this->projectId)
            ->line('Project Title: ' . $this->projectTitle)
            ->line('Submission Date: ' . now())
            ->action('View Project', url('/submission-details/show/'.$this->projectId))
            ->line('Please review the project at your earliest convenience.')
            ->salutation('Sincerely, RPIMTS!');
        }
        if ($notifiable instanceof UsersModel && $notifiable->isResearcher()) {
            // User notification content
            return (new MailMessage)
                ->subject('Research Project Submitted')
                ->greeting('Dear Researcher,')
                ->line('Your research project has been successfully submitted.')
                ->line('Here are the Project Details:')
                ->line('Project ID: ' . $this->projectId)
                ->line('Project Title: ' . $this->projectTitle)
                ->line('Submission Date: ' . now()) // Replace with the actual submission date
                ->line('You can view the project status by visiting the link below:')
                ->action('View Project', url('/submission-details/show/'.$this->projectId))
                ->line('Thank you for your submission and Please review the project at your earliest convenience.')
                ->salutation('Sincerely, RPIMTS!');
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
                'link' => url('/submission-details/show/' . $this->projectId),
                'role' => 'director',
            ];
        } elseif ($notifiable->isResearcher()) {
            // User notification content
            return [
                'subject' => 'New Research Project Submission',
                'message' => 'Your research project submission has been successfully received.',
                'project_id' => $this->projectId,
                'link' => url('/submission-details/show/' . $this->projectId),
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
