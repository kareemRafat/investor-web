<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionConfirmationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $type, public string $url)
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
        $typeLabel = $this->type === 'idea' 
            ? __('idea.summary.title', [], $locale) 
            : __('investor.steps.step7.project', [], $locale);

        return (new MailMessage)
            ->subject(__('notifications.submission_received_title', [], $locale))
            ->view('emails.submission-confirmation', [
                'notifiable' => $notifiable,
                'typeLabel' => $typeLabel,
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
        $typeLabel = $this->type === 'idea' 
            ? __('idea.summary.title', [], $locale) 
            : __('investor.steps.step7.project', [], $locale);

        return [
            'title' => __('notifications.submission_received_title', [], $locale),
            'message' => __('notifications.submission_received_body', ['type' => $typeLabel], $locale),
            'action_url' => $this->url,
        ];
    }
}
