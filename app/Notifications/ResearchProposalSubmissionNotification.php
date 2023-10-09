<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;
use App\Models\ProjectsModel;
use App\Models\User;

class ResearchProposalSubmissionNotification extends Notification
{
    use Queueable;
    private $projectId;
    private $researcherId;
    private $researcherMail;
    private $projectTitle;
    public $projects;

    /**
     * Create a new notification instance.
     */
    public function __construct($projectId, $researcherId, $researcherMail, $projectTitle, $projects)
    {
            $this->projectId = $projectId;
            $this->researcherId = $researcherId;
            $this->researcherMail = $researcherMail;
            $this->projectTitle = $projectTitle;
            $this->projects = $projects;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
{
    if ($notifiable instanceof User && $notifiable->isDirector()) {
        // Admin notification content
        return (new MailMessage)
            ->subject('New Research Proposal Submission')
            ->greeting('A new research project has been submitted')
            ->line('A new research project has been submitted.' . "\n\n" .
            'Here are the Project Details:' . "\n\n" .
            'Researcher ID: ' . $this->researcherId . "\n" .
            'Researcher Email: ' . $this->researcherMail . "\n" .
            'Project ID: ' . $this->projectId . "\n" .
            'Project Title: ' . $this->projectTitle . "\n" .
            'Submission Date: ' . now())
            ->action('View Project', url('/submission-details/show/'.$this->projectId))
            ->line('Please review the project at your earliest convenience.')
            ->salutation('Regards, AIRCoDe RPIMTS')
            ->markdown('vendor.mail.emails.ResearchProposalSubmission', [
                'researcherId' => $this->researcherId,
                'researcherMail' => $this->researcherMail,
                'projectId' => $this->projectId,
                'projectTitle' => $this->projectTitle,
            ]);
    }
    if ($notifiable instanceof User && $notifiable->isResearcher()) {
        // User notification content
        return (new MailMessage)
            ->subject('Research Project Submitted')
            ->greeting('Your research project has been successfully submitted')
            ->line('Your research project has been successfully submitted.' . "\n\n" .
            'Here are the Project Details:' . "\n\n" .
            'Project ID: ' . $this->projectId . "\n" .
            'Project Title: ' . $this->projectTitle . "\n" . 
            'Submission Date: ' . now())
            ->action('View Project', url('/submission-details/show/'.$this->projectId))
            ->salutation('Regards, AIRCoDe RPIMTS')
            ->markdown('vendor.mail.emails.ResearchProposalSubmission', [
                'researcherId' => $this->researcherId,
                'researcherMail' => $this->researcherMail,
                'projectId' => $this->projectId,
                'projectTitle' => $this->projectTitle,
            ]);
    }
    
    // Remove the following line, as it's not needed
    // return null;
    return (new MailMessage)
        ->line('Default notification message for other users')
        ->salutation('Regards, AIRCoDe RPIMTS');
}


    public function toDatabase($notifiable)
    {
        // Check if the notifiable is an admin (director)
        if ($notifiable instanceof User && $notifiable->isDirector()) {
            // Admin notification content
            return new DatabaseMessage([
                'message' => 'A new research project has been submitted by ' . $this->projects->user_id . ', with the title "' . $this->projects->projname . '".',
                // 'icon' => 'fa-solid fa-circle-check fa-lg text-white',
                'icon' => 'fas fa-file-alt mr-2',
                'action_url' => route('submission-details.show', [
                    'id' => $this->projectId, 
                    'researcherId' => $this->researcherId,
                    'notificationId' => $this->id
                ]),
                'color_icon' => 'icon-circle bg-gradient-success',
                'type' => 'research_proposal_submission',
            ]);
        } if ($notifiable instanceof User && $notifiable->isResearcher()) {
            // User notification content
            return [
                'message' => 'Research Submitted Successfully.',
                'icon' => 'fas fa-check mr-2 mx-auto',
                // fa-solid fa-circle-check fa-lg text-white   
                'action_url' => route('submission-details.show', [
                    'id' => $this->projectId, 
                    'researcherId' => $this->researcherId,
                    'notificationId' => $this->id
                ]),
                'color_icon' => 'rounded-circle bg-gradient-success text-white p-2',
                'type' => 'research_proposal_submission',
            ];
        }

        return null; // Return null if notifiable is not an admin or researcher
    }

}
