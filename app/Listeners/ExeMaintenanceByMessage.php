<?php

namespace App\Listeners;
use App\Events\ExecuteMaintenanceMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order\Department;
class ExeMaintenanceByMessage
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
    public function handle(ExecuteMaintenanceMessage $event): void
    {
        $department = Department::find(3);
        $order = $event->order;
        $order->departments()->attach(2, ['isExecute' => 0]);
        $department->orders()->updateExistingPivot($order->id, [
            'isExecute' => 1,
        ]);
        $order->orderStatus = "تم تنفيذ الصيانة عن طريق إرسال رسالة";
        $order->save();
    }
}
