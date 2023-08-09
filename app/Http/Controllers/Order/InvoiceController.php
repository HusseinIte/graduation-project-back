<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class InvoiceController extends Controller
{
    public function GeneratePdfInvoice($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems;
        $pdf = PDF::loadView('admin.order.invoice_pdf', ['order' => $order, 'items' => $items]);
        return $pdf->download('international.pdf');
    }

    public function PrintInvoice($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems;
        return View('admin.order.invoice_pdf', ['order' => $order, 'items' => $items]);
//        return $pdf->download('international.pdf');
    }
}
