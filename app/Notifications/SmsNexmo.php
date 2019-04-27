<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class SmsNexmo extends Notification
{
    use Queueable;
   /**
     * Get the notification's delivery channels.
     *
     * @param   mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'] ;
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
            ->content('Hola LaraCamp');
    }

}