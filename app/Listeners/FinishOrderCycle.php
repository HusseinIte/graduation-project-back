<?php

namespace App\Listeners;

use App\Events\DeliverOrder;
use App\Models\Order\Department;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FinishOrderCycle
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
    public function handle(DeliverOrder $event): void
    {
        $department = Department::find(2);
        $order = $event->order;
        $department->orders()->updateExistingPivot($order->id, [
            'isExecute' => 1,
        ]);
        $order->orderStatus = "تم تسليم الطلب";
        $order->save();
    }
}
