<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\DirectOrder;
use App\Models\Order\DirectOrderItem;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\User\User;
use Illuminate\Http\Request;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class AdminOrderService
{
    protected $customerOrderService;

    public function __construct(CustomerOrderService $customerOrderService)
    {
        $this->customerOrderService = $customerOrderService;
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', ['orders' => $orders]);
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.order.create', ['products' => $products]);
    }

    public function showDirectOrder()
    {
        $orders = DirectOrder::all();
        return view('admin.order.direct_order', ['orders' => $orders]);
    }


    public function getOrderDetails($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems;
        if ($order->orderType == "صيانة") {
            return view('admin.order.orderMaintenanceDetail', ['order' => $order, 'items' => $items]);
        }
        return view('admin.order.order_details', ['order' => $order, 'items' => $items]);
    }

    public function storeDirectOrderItem($request, $id)
    {
        $Items = $request->items;
        foreach ($Items as $item) {
            DirectOrderItem::create([
                'direct_order_id' => $id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
        }
    }

    public function createDirectOrder(Request $request)
    {
        $order = DirectOrder::create([
            'customerName' => $request->customerName,
            'centerName' => $request->centerName,
            'orderStatus' => 'الطلب قيد الإنتظار في المستودع',
            'orderType' => 'شراء مباشر',
            'totalPrice' => $request->totalPrice,
        ]);
        $this->storeDirectOrderItem($request, $order->id);
        return $order;
    }

// send order from admin to warehouse
    public function sendDirectOrder(Request $request)
    {
        $process = $this->customerOrderService->processingPurchaseOrder($request);
        if ($process['status'] == "error") {
            return $process;
        }
        if (count($request->items) == 0) {
            return response()->json([
                'status' => 'failed',
                'message' => 'لايمكن إنشاء طلب من دون منتجات'
            ]);
        }
        $order = $this->createDirectOrder($request);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح'
        ]);

    }
}
