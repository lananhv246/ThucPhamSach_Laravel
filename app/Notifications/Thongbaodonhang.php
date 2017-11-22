<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\PhieuXuatKho;
use Carbon\Carbon;

class Thongbaodonhang extends Notification
{
    use Queueable;
    protected $phieuxuatkho;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PhieuXuatKho $phieuxuatkho)
    {
        $this->PhieuXuatKho = $phieuxuatkho;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase($notifiable)
    {
        return [
            'phieuxuatkho'=>$this->phieuxuatkho,
            'user'=>$notifiable,
            // 'message' => 'A new post was published on Laravel News.',
            // 'action' => url($this->phieuxuatkho->ten_phieuxuatkho)
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         'message' => 'A new post was published on Laravel News.',
    //         'action' => url($this->phieuxuatkho->ten_phieuxuatkho)
    //     ];
    // }
}
