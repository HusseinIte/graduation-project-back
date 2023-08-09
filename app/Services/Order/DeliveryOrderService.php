<?php


namespace App\Services\Order;


use App\Events\DeliverOrder;
use App\Events\ReceiveOrderByDelivery;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Department;
use App\Models\Order\Order;
use App\Models\User\Customer;
class DeliveryOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(2);
        $orders = $department->orders;
        return OrderResource::collection($orders);
    }

    // Receive Order by delivery from warehouse
    public function receiveOrderFromWarehouse($id)
    {
        $order = Order::find($id);
        ReceiveOrderByDelivery::dispatch($order);
        $customer=Customer::find($order->customer_id);
        $user=$customer->user;
        $user->notify(new \App\Notifications\DeliveryOrder($order));
        return response()->json([
            'status' => 'success',
            'message' => 'جاري شحن الطلب'
        ]);
    }

    public function deliverOrderToCustomer($id)
    {
        $order = Order::find($id);
        DeliverOrder::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'تم تسليم الطلب'
        ]);
    }

    public function getExecutedOrder()
    {
        $department = Department::find(2);
        return $department->orders()->wherePivot('isExecute', 1)->get();
    }

    public function getNewOrder()
    {
        $department = Department::find(2);
        return $department->orders()->wherePivot('isExecute', 0)->get();
    }

}
