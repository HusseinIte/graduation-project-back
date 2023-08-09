@extends('layouts.admin')

@section('title')
    تفاصيل طلب
@endsection

@section('contentheader')
    تفاصيل طلب
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.order.index')}}">الطلبات</a>
@endsection

@section('contentheaderactive')
    تفاصيل
@endsection

@section('content')
    <div class="col-8">
        <div class="card-header border">
            <h3 class="card-title float-left">معلومات الطلب</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table  table-bordered">
                <tr>
                    <th class="col-4">رقم الطلب</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th>تاريخ الطلب</th>
                    <td>{{$order->created_at}}</td>
                </tr>
                <tr>
                    <th> نوع الطلب</th>
                    <td>{{$order->orderType}}</td>
                </tr>
                <tr>
                    <th>اسم الزبون</th>
                    <td>{{$order->customer->firstName." ".$order->customer->lastName}}</td>
                </tr>
                <tr>
                    <th>اسم المركز</th>
                    <td>{{$order->customer->centerName}}</td>
                </tr>
                <tr>
                    <th>حالة الطلب</th>
                    <td><span
                            class="badge @if($order->orderStatus==("الطلب قيد الإنتظار في المستودع"||"الطلب قيد الإنتظار في الصيانة"))badge-info
                                @elseif($order->orderStatus=="الطلب جاهز في المستودع") badge-warning
                                  @elseif($order->orderStatus=="جاري شحن الطلب") badge-secondary
                                 @elseif($order->orderStatus=="تم تسليم الطلب") badge-success
                                   @elseif($order->orderStatus=="الطلب مرفوض") badge-danger
                                 @endif">{{$order->orderStatus ."  "."بتاريخ"."  ". $order->updated_at}}</span>
                    </td>

                </tr>
                <tr>
                    <th>قيمة الطلب</th>
                    <td>{{$order->totalPrice}}</td>
                </tr>
                @if($order->orderStatus=="الطلب مرفوض")
                    <tr>
                        <th>سبب الرفض</th>
                        <td>{{$order->totalPrice}}</td>
                    </tr>
                @endif
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="container">
        <div class="row card-header border">
            <h3 class="card-title float-left"> منتجات الطلب</h3>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-image">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">رمز المنتج</th>
                        <th scope="col">صورة</th>
                        <th scope="col">الصنف</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الكمية</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <th scope="row">{{$item->product->numberModel}}</th>
                            <td class="w-25">
                                <img
                                    src="{{route('ProductImage',$item->product_id)}}"
                                    class="img-fluid img-thumbnai img-lg float-left" alt="Sheep">
                            </td>
                            <td>{{$item->product->category->name}}</td>
                            <td>{{$item->product->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <button type="button" class="btn btn-block btn-secondary">تفاصيل</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-12 align-content-center">
            <a href="{{route('printInvoice',$order->id)}}" target="_blank" class="btn btn-default"><i
                    class="fas fa-print"></i> Print</a>
            <a href="{{route('generatePdf',$order->id)}}"
               class="btn  btn-secondary"> <i class="fas fa-download"></i> Generate PDF</a>
        </div>
    </div>
@endsection



