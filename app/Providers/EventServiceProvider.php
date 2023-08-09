<?php

namespace App\Providers;

use App\Events\DeliverOrder;
use App\Events\ExecuteOrder;
use App\Events\ReceiveOrderByDelivery;
use App\Events\RejectOrder;
use App\Events\SendOrder;
use App\Events\ExecuteMaintenanceMessage;
use App\Events\ExeMaintenanceEvent;
use App\Events\MaintenanceGoStore;
use App\Events\MaintenanceDel;
use App\Listeners\ChangeOrderStatus;
use App\Listeners\FinishOrderCycle;
use App\Listeners\MoveOrderToCustomer;
use App\Listeners\MoveOrderToDelivery;
use App\Listeners\MoveOrderToWarehouse;
use App\Listeners\SendRejectNotification;
use App\Listeners\ExeMaintenanceByMessage;
use App\Listeners\ExeMaintenanceGoStore;
use App\Listeners\ExeMaintenanceDel;
use App\Listeners\ExeMaintenanceListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ExecuteOrder::class => [
            MoveOrderToDelivery::class,
        ],
        ReceiveOrderByDelivery::class => [
            MoveOrderToCustomer::class,
        ],
        DeliverOrder::class => [
            FinishOrderCycle::class,
        ],
        ExecuteMaintenanceMessage::class => [
            ExeMaintenanceByMessage::class,
        ],
        MaintenanceGoStore::class => [
            ExeMaintenanceGoStore::class,
        ],
        MaintenanceDel::class => [
            ExeMaintenanceDel::class,
        ],
        ExeMaintenanceEvent::class => [
            ExeMaintenanceListener::class,
        ],
        RejectOrder::class => [
            SendRejectNotification::class
        ]

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
