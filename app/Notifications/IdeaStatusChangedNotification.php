<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdeaStatusChangedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $title,
        public string $statusLabel,
        public string $url,
        public ?string $adminNote = null
    ) {
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
            ->subject(__('notifications.status_updated_title', [], $locale))
            ->view('emails.idea-status-changed', [
                'notifiable' => $notifiable,
                'title' => $this->title,
                'statusLabel' => $this->statusLabel,
                'url' => $this->url,
                'adminNote' => $this->adminNote,
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
            'title' => __('notifications.status_updated_title', [], $locale),
            'message' => __('notifications.status_updated_body', ['title' => $this->title, 'status' => $this->statusLabel], $locale),
            'action_url' => $this->url,
            'admin_note' => $this->adminNote,
        ];
    }
}
