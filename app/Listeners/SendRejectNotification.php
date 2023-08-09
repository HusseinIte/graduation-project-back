<?php

namespace App\Listeners;

use App\Events\RejectOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRejectNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RejectOrder $event): void
    {
        $order = $event->order;
        $order->orderStatus = "الطلب مرفوض";
        $order->save();
    }
}
