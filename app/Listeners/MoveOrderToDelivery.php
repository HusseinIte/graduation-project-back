<?php

namespace App\Listeners;

use App\Events\ExecuteOrder;
use App\Events\SendOrder;
use App\Models\Order\Department;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Queue\InteractsWithQueue;

class MoveOrderToDelivery
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
    public function handle(ExecuteOrder $event): void
    {
        $department = Department::find(1);
        $order = $event->order;
        $order->departments()->attach(2, ['isExecute' => 0]);
        $department->orders()->updateExistingPivot($order->id, [
            'isExecute' => 1,
        ]);
        $order->orderStatus = "الطلب جاهز في المستودع";
        $order->save();
//        broadcast(new ExecuteOrder($order));

    }
}
