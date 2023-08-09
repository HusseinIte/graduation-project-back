<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use App\Models\User\Customer;
class AddNewOrder extends Notification
{
    use Queueable;
    private $order;
    /**
     * Create a new notification instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase($notifiable)
    {
        return [
           'order_id' => $this->order['id'],
           'title'=>'تم إضافة طلبية جديدة',
           'user_id'=> Auth::user()->id,
           'customer_id'=> $this->order['customer_id'],
           'customer_name'=> Auth::user()->customer->firstName.' '.Auth::user()->customer->lastName
        ];
    }
}
