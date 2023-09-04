<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\UsersModel;

class ContactMessageNotification extends Notification
{
    use Queueable;
    public $contactId;

    /**
     * Create a new notification instance.
     */
    public function __construct($contactId)
    {
        $this->contactId = $contactId; // Remove one dollar sign
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
        
        if ($notifiable instanceof UsersModel && $notifiable->isDirector()) {
        return (new MailMessage)
                    ->line('A New Message Notification!')
                    ->action('Notification Action', url('/'));
                    // ->line('Thank you for using our application!');
        }
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
