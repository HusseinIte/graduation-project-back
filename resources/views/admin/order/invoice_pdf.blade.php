<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>فاتورة</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            direction: rtl;
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-header span {
            font-size: 24px;
            font-weight: bold;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 0;
            font-size: 18px;
        }
    </style>
</head>
<body onload="window.print();">
<div class="invoice-header">
    <span>فاتورة</span>
    <span class="text-bold"> العالمية للبصريات</span>
</div>
<div class="invoice-details">
    <p>رقم الطلب: {{ $order->id }}</p>
    <p>تاريخ الإصدار: {{ $order->created_at }}</p>
    <p>اسم العميل: {{ $order->customer->centerName }}</p>
    <p>العنوان: {{ $order->customer->address }}</p>
</div>
<table>
    <thead>
    <tr>
        <th>المنتج</th>
        <th>الكمية</th>
        <th>السعر</th>
        <th>الإجمالي</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            <td>{{ $item->product->category->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->product->price* $item->quantity}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">الإجمالي</td>
        <td>{{ $order->totalPrice }}</td>
    </tr>
    </tfoot>
</table>
</body>
</html>
