<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use App\Models\Shopping\Cart;
use App\Models\User\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Monolog\error;
use App\Models\Order\Maintenance;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class CustomerOrderService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function getMyOrder()
    {
        $customer = User::find(Auth::id())->customer;
        $orders = $customer->orders;
        return OrderResource::collection($orders);

    }
    public function getMyPayOrder()
    {
        $customer = User::find(Auth::id())->customer;
        $orders = $customer->orders()->where('orderType','شراء')->get();
        return OrderResource::collection($orders);

    }
    public function getMyMainOrder()
    {
        $customer = User::find(Auth::id())->customer;
        $orders = $customer->orders()->where('orderType','صيانة')->get();
        return OrderResource::collection($orders);

    }
    public function getMainOrder($id)
    {
        $order = Maintenance::where('order_id',$id)->first();
        return $order;

    }

    public function createPurchaseOrder(Request $request, $customer)
    {
        $order = Order::create([
            'customer_id' => $customer->id,
            'orderStatus' => 'الطلب قيد الإنتظار في المستودع',
            'orderType' => 'شراء',
            'totalPrice' => $request->totalPrice
        ]);
        $this->storeOrderItem($request, $order->id);
        return $order;
    }

    public function storeOrderDetails($request, $id)
    {
        $image = $this->imageService->uploadImage($request);
        OrderDetail::create([
            'order_id' => $id,
            'image_id' => $image->id,
            'description' => $request->description
        ]);
    }

    public function createMaintenanceOrder(Request $request, $customer)
    {
        $order = Order::create([
            'customer_id' => $customer->id,
            'orderStatus' => 'الطلب قيد الإنتظار في الصيانة',
            'orderType' => 'صيانة',
            'totalPrice' => 0
        ]);
        $this->storeOrderDetails($request, $order->id);
        return $order;
    }

// processing order before create
    public function processingPurchaseOrder($request)
    {
        $cartItems = $request->items;
        foreach ($cartItems as $item) {
            $product = Product::find($item['product_id']);
            if ($item['quantity'] > $product->amount) {
                return [
                    'status' => 'error',
                    'message' => 'this is overstock order reduce quantity for product :' . $item['product_id']
                ];
            }
        }
        return [
            'status' => 'success',
        ];
    }

    public function storeOrderItem($request, $id)
    {
        $cartItems = $request->items;
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            ]);
        }
    }

// send order from user to warehouse
    public function sendPurchaseOrder(Request $request)
    {
        $user = User::find(Auth::id());
        $customer = $user->customer;
        //return $request;
        $process = $this->processingPurchaseOrder($request);
        if ($process['status'] == "error") {
            return $process;
        }
        if (count($request->items) == 0) {
            return response()->json([
                'status' => 'failed',
                'message' => 'لايمكن إنشاء طلب من دون منتجات'
            ]);
        }
        $order = $this->createPurchaseOrder($request, $customer);
        $order->departments()->attach(1, ['isExecute' => 0]);
        SendOrder::dispatch($order);
        $users = User::whereIn('user_type_id', [2, 3])->get();
        foreach ($users as $user) 
        { 
            $user->notify(new \App\Notifications\AddNewOrder($order));
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح'
        ]);

    }

    // send order from user to maintenance
    public function sendMaintenanceOrder(Request $request)
    {
        $user = User::find(Auth::id());
        $customer = $user->customer;
        $order = $this->createMaintenanceOrder($request, $customer);
        $order->departments()->attach(3, ['isExecute' => 0]);
        SendOrder::dispatch($order);
        return response()->json([
            'status' => 'success',
            'message' => 'تم إرسال الطلب بنجاح',
        ]);

    }
    public function receiveOrderByCustomer($id)
    {
        $order = Order::find($id);
        if($order->orderStatus == "جاري شحن الطلب")
        {
            $order->orderStatus = "تم استلام الطلب";
            $order->save();
            return response()->json([
                'status' => 'success',
                'message' => 'تم استلام الطلب بنجاح',
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'حالة الطلب يجب أن تكون جاري الشحن',
            ]);
        }
        

    }
    

}
