<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Models\Order\Order;
use App\Models\User\User;
use App\Services\Order\CustomerOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    protected $customerOrderService;

    public function __construct(CustomerOrderService $customerOrderService)
    {
        $this->customerOrderService = $customerOrderService;
    }

    public function getMyOrder()
    {
        return $this->customerOrderService->getMyOrder();

    }
    public function getMyPayOrder()
    {
        return $this->customerOrderService->getMyPayOrder();

    }
    public function getMyMainOrder()
    {
        return $this->customerOrderService->getMyMainOrder();

    }
    public function getMainOrder($id)
    {
        return $this->customerOrderService->getMainOrder($id);

    }
    public function receiveOrderByCustomer($id)
    {
        return $this->customerOrderService->receiveOrderByCustomer($id);

    }


    public function sendPurchaseOrder(Request $request)
    {
        return $this->customerOrderService->sendPurchaseOrder($request);
    }

    public function sendMaintenanceOrder(Request $request)
    {
        return $this->customerOrderService->sendMaintenanceOrder($request);
    }
}
