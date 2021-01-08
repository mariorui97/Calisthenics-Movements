<?php

namespace App\Notifications;

use App\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmail extends VerifyEmail
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

//    public function toMail($notifiable)
//    {
//        $user = Auth::user();
//        return (new MailMessage)->view(
//            'emails.order', ['user' => $user]
//        );
//    }

//    public function toMail($notifiable)
//    {
////        $user_id = $this->user_id;
////        $user = User::find($user_id);
//        $url = $this->verificationUrl($notifiable);
//
//        return (new MailMessage)
//            ->greeting('Yeees!')
//            ->line('One of your invoices has been paid!')
//            ->action('View Invoice', $url)
//            ->line('Thank you for using our application!');
//    }

    public function toMail($notifiable)
    {
        $user = $this->user;
        $url = $url = $this->verificationUrl($notifiable);
        return (new MailMessage)->view(
            'emails.verifyMessage', compact('url','user')
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
