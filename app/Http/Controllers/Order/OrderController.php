<?php

namespace App\Http\Controllers\Order;

use App\Events\RejectOrder;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAllOrder()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function getOrderById($id)
    {
        $order = Order::find($id);
        return new OrderResource($order);
    }

    public function rejectOrder(Request $request, $id)
    {
        $order = Order::find($id);
        RejectOrder::dispatch($order, $request->message);
        return response([
            'status' => 'failed',
            'message' => $request->message]);
    }
}
