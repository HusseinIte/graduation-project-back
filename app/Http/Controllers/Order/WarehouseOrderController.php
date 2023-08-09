<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\WarehouseOrderService;
use Illuminate\Http\Request;

class WarehouseOrderController extends Controller
{
    protected $warehouseOrder;

    public function __construct(WarehouseOrderService $warehouseOrder)
    {
        $this->warehouseOrder = $warehouseOrder;
    }

    public function getAllOrder()
    {
        return $this->warehouseOrder->getAllOrder();
    }

    public function getOrderExecuted()
    {
        return $this->warehouseOrder->getOrderExecuted();
    }

    public function getNewOrder()
    {
        return $this->warehouseOrder->getNewOrder();
    }

    public function executeOrder($id)
    {
        return $this->warehouseOrder->executeOrder($id);
    }

    public function getAllDirectOrder()
    {

        return $this->warehouseOrder->getAllDirectOrder();
    }

    public function getAllDirectOrderExecuted()
    {
        return $this->warehouseOrder->getAllDirectOrderExecuted();
    }

    public function getAllNewDirectOrder()
    {
        return $this->warehouseOrder->getAllNewDirectOrder();
    }

    public function executeDirectOrder($id)
    {
        return $this->warehouseOrder->executeDirectOrder($id);
    }
}
