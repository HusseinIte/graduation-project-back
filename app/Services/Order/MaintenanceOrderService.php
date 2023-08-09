<?php


namespace App\Services\Order;


use App\Events\SendOrder;
use App\Events\ExecuteMaintenanceMessage;
use App\Events\ExeMaintenanceEvent;
use App\Events\MaintenanceGoStore;
use App\Events\MaintenanceDel;
use App\Events\ExecuteOrder;
use App\Events\RejectOrder;
use App\Events\SendAlertProduct;
use App\Http\Resources\DirectOrderResource;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order\Department;
use App\Models\Order\DirectOrder;
use App\Models\Order\Order;
use App\Models\Order\OrderDepartment;
use http\Env\Request;
use Illuminate\Database\QueryException;
use App\Models\Order\Maintenance;

class MaintenanceOrderService
{
    public function getAllOrder()
    {
        $department = Department::find(3);
        $orders = $department->orders;
        return OrderResource::collection($orders);
    }


    public function createMaintenance($m_type,$desc,$order)
    {
        $maintenance = Maintenance::create([
            'order_id' => $order->id,
            'desc' => $desc,
            'm_type' => $m_type,
        ]);
        return $order;
    }


    public function executeMaintenanceByMessage($request)
    {
        $order = Order::find($request->id);
        $maintenance=Maintenance::where('order_id', $request->id)->get();
        if(count($maintenance) > 0)
        {
            $errorMessage = 'هذاالطلب تمت معالجته';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        else
        {
            $m_type=1;
            $desc=$request->desc;
            $maintenance = $this->createMaintenance($m_type,$desc,$order);
        }
        
        try {
            ExecuteMaintenanceMessage::dispatch($order);
        } catch (QueryException $e) {
            $errorMessage = 'هذا الطلب منفذ';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم تنفيذ الطلب بنجاح'
        ]);

    }

    public function maintenanceByGoStore($request)
    {
        $order = Order::find($request->id);
        $maintenance=Maintenance::where('order_id', $request->id)->get();
        if(count($maintenance) > 0)
        {
            $errorMessage = 'هذاالطلب تمت معالجته';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        else
        {
            $m_type=2;
            $desc="";
            $maintenance = $this->createMaintenance($m_type,$desc,$order);
        }
        
        try {
            MaintenanceGoStore::dispatch($order);
        } catch (QueryException $e) {
            $errorMessage = 'هذا الطلب منفذ';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم تنفيذ الطلب بنجاح'
        ]);

    }

    public function maintenanceByDel($request)
    {
        $order = Order::find($request->id);
        $maintenance=Maintenance::where('order_id', $request->id)->get();
        if(count($maintenance) > 0)
        {
            $errorMessage = 'هذاالطلب تمت معالجته';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        else
        {
            $m_type=3;
            $desc="";
            $maintenance = $this->createMaintenance($m_type,$desc,$order);
        }
        
        try {
            MaintenanceDel::dispatch($order);
        } catch (QueryException $e) {
            $errorMessage = 'هذا الطلب منفذ';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم تنفيذ الطلب بنجاح'
        ]);

    }



    public function executeMaintenance($request)
    {
        $order = Order::find($request->id); 
        $order->totalPrice=$request->price;       
        try {
            ExeMaintenanceEvent::dispatch($order);
            
        } catch (QueryException $e) {
            $errorMessage = 'هذا الطلب منفذ';
            return response()->json([
                'status' => 'failed',
                'message' => $errorMessage]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'تم تنفيذ الطلب بنجاح'
        ]);

    }
}
