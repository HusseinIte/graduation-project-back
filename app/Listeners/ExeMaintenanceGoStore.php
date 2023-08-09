<?php

namespace App\Listeners;

namespace App\Listeners;
use App\Events\MaintenanceGoStore;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Order\Department;

class ExeMaintenanceGoStore
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
    public function handle(MaintenanceGoStore $event): void
    {
        $department = Department::find(3);
        $order = $event->order;
        //$order->departments()->attach(2, ['isExecute' => 0]);
        //$department->orders()->updateExistingPivot($order->id, [
        //    'isExecute' => 1,
        //]);
        $order->orderStatus = "يحتاج للفحص من قريق الصيانة الذي سيقوم بزيارة المتجر";
        $order->save();
    }
}
