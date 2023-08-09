@extends('layouts.admin')

@section('title')
    الطلبات
@endsection

@section('contentheader')
    الطلبات
@endsection

@section('contentheaderactive')
    الطلبات
@endsection

@section('index')
    active
@endsection

@section('order')
    active
@endsection
@section('menu-open')
    menu-open
@endsection


@section('content')
    <!-- TABLE: LATEST ORDERS -->
    <div class="card" id="app">
        <example-component></example-component>
        <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0" id="orders-table">
                    <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>اسم المركز</th>
                        <th>نوع الطلب</th>
                        <th>تكلفة الطلب</th>
                        <th>حالة الطلب</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr id="{{$order->id}}">
                            <td><a href="pages/examples/invoice.html">{{$order->id}}</a></td>
                            <td>{{$order->customer->centerName}}</td>
                            <td>{{$order->orderType}}</td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->totalPrice}}</div>
                            </td>
                            <td><span
                                    class="badge @if($order->orderStatus==("الطلب قيد الإنتظار في المستودع"||"الطلب قيد الإنتظار في الصيانة"))badge-info
                                @elseif($order->orderStatus=="الطلب جاهز في المستودع") badge-warning
                                  @elseif($order->orderStatus=="جاري شحن الطلب") badge-secondary
                                 @elseif($order->orderStatus=="تم تسليم الطلب") badge-success
                                   @elseif($order->orderStatus=="الطلب مرفوض") badge-danger
                                 @endif">{{$order->orderStatus}}</span>
                            </td>
                            <td>
                                <a href="{{route('admin.order.details',$order->id)}}"
                                   class="btn btn-block btn-secondary">تفاصيل</a>

                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.col -->
@endsection

@section('script')
    <script>
        Echo.channel('orders').listen('', (data) => {
            location.reload();
        })
            .listen('ExecuteOrder', (data) => {
                location.reload();
            })
            .listen('ReceiveOrderByDelivery', (data) => {
                location.reload();
            })
            .listen('DeliverOrder', (data) => {
                location.reload();
            })
            .listen('RejectOrder', (data) => {
                location.reload();
                console.log(data.message);
            });
    </script>
@endsection


