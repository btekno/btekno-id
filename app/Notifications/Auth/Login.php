<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Login extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ip;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (! $notifiable->spammy) {
            return (new MailMessage())
                ->subject('Account security notice - Successful login')
                ->greeting('Hello @'.$notifiable->username.' 👋')
                ->line('There was a successful login to **'.$notifiable->username.'** from **'.$this->ip.'**. If this was not you please contact us immediately.')
                ->line('Thank you for became Btekno Family!');
        }

        return null;
    }
}
