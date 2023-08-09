<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Services\Order\AdminOrderService;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    protected $adminOrderService;

    public function __construct(AdminOrderService $adminOrderService)
    {
        $this->adminOrderService = $adminOrderService;
    }

    public function index()
    {
        return $this->adminOrderService->index();
    }

    public function create()
    {
        return $this->adminOrderService->create();
    }

    public function showDirectOrder()
    {
        return $this->adminOrderService->showDirectOrder();
    }

    public function getOrderDetails($id)
    {
        return $this->adminOrderService->getOrderDetails($id);
    }

    public function getAllOrder()
    {
        return $this->adminOrderService->getAllOrder();
    }

    public function sendDirectOrder(Request $request)
    {
        return $this->adminOrderService->sendDirectOrder($request);
    }
}
