<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionExpiryReminderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $planLabel)
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
            ->subject(__('notifications.expiry_reminder_title', [], $locale))
            ->view('emails.subscription-expiry-reminder', [
                'notifiable' => $notifiable,
                'planLabel' => $this->planLabel,
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
            'title' => __('notifications.expiry_reminder_title', [], $locale),
            'message' => __('notifications.expiry_reminder_body', ['plan' => $this->planLabel], $locale),
            'action_url' => route('main.pricing'),
        ];
    }
}
