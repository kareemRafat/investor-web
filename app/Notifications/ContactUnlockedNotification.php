<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUnlockedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $title, public string $url)
    {
        //
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
        $locale = $notifiable->preferredLocale();

        return (new MailMessage)
            ->subject(__('notifications.contact_unlocked_title', [], $locale))
            ->view('emails.contact-unlocked', [
                'notifiable' => $notifiable,
                'title' => $this->title,
                'url' => $this->url,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $locale = $notifiable->preferredLocale();

        return [
            'title' => __('notifications.contact_unlocked_title', [], $locale),
            'message' => __('notifications.contact_unlocked_body', ['title' => $this->title], $locale),
            'action_url' => $this->url,
        ];
    }
}
