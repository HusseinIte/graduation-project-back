<?php

namespace App\Listeners;

namespace App\Listeners;
use App\Events\MaintenanceDel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order\Department;

class ExeMaintenanceDel
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
    public function handle(MaintenanceDel $event): void
    {
        $department = Department::find(3);
        $order = $event->order;
        //$order->departments()->attach(2, ['isExecute' => 0]);
        //$department->orders()->updateExistingPivot($order->id, [
        //    'isExecute' => 1,
        //]);
        $order->orderStatus = "يحتاج للشحن من قيل عامل التوصيل";
        $order->save();
    }
}
