<?php

namespace App\Listeners;

use App\Events\ReceiveOrderByDelivery;


class MoveOrderToCustomer
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
    public function handle(ReceiveOrderByDelivery $event): void
    {
        $order = $event->order;
        $order->orderStatus = "جاري شحن الطلب";
        $order->save();
    }
}
