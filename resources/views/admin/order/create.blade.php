@extends('layouts.admin')

@section('title')
    إضافة طلب
@endsection

@section('contentheader')
    إضافة طلب
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.order.index')}}">الطلبات</a>
@endsection

@section('contentheaderactive')
    إضافة
@endsection

@section('create')
    active
@endsection
@section('order')
    active
@endsection
@section('menu-open')
    menu-open
@endsection

@section('content')
    <!-- /.row -->
    <div class="card-footer clearfix">
        <span class="text-bold"> السعر الإجمالي : </span> <span class=" text-cyan text-bold"
                                                                id="price-container"></span>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول المنتجات</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">أختر</th>
                            <th scope="col">id</th>
                            <th scope="col">رمز المنتج</th>
                            <th scope="col">صورة</th>
                            <th scope="col">الصنف</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col">كمية الطلب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><input type="checkbox"></td>
                                <th scope="row">{{$product->id}}</th>
                                <th scope="row">{{$product->numberModel}}</th>
                                <td class="w-25">
                                    <img
                                        src="{{route('ProductImage',$product->id)}}"
                                        class="img-fluid img-thumbnai img-lg float-left" alt="Sheep">
                                </td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->amount}}</td>
                                <td>
                                    <input type="number" min="1" max="100">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    <div class="row justify-content-center">
        <div class="card card-secondary col-8" style="padding:0;">
            <div class="card-header">
                <h3 class="card-title float-left">بيانات المركز </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="customerName">إسم الزبون</label>
                    <input type="text" class="form-control" id="customerName" name="customerName"
                           placeholder="إسم الزبون">
                </div>
                <div class="form-group">
                    <label for="centerName">اسم المركز</label>
                    <input type="text" class="form-control" name="centerName" id="centerName"
                           placeholder="اسم المركز">
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->
    <div style="text-align: center;">
        <a
            class="btn btn-secondary" onclick="sendRequest()">إرسال</a>
    </div>

@endsection

@section('script')
    <script>
        $('#myTable input[type="checkbox"]').on('change', function () {
            var totalPrice = 0;
            $('#myTable input[type="checkbox"]:checked').each(function () {
                var row = $(this).closest('tr');
                var price = parseFloat(row.find('td:eq(3)').text());
                var quantity = row.find('input[type="number"]').val();
                var itemPrice = price * quantity;
                totalPrice += itemPrice;
            });
            $('#price-container').text(totalPrice.toFixed(2));
        });

        function sendRequest() {
            var rows = $('#myTable').find('tr');
            var totalPrice = 0;
            var items = [];
            for (var i = 1; i < rows.length; i++) {
                var checkbox = rows[i].cells[0].getElementsByTagName("input")[0];
                if (checkbox.checked) {
                    var product_id = rows[i].cells[1].innerHTML;
                    var price = rows[i].cells[5].innerHTML;
                    var quantity = $(rows[i]).closest('tr').find('input[type="number"]').val();
                    console.log(product_id + ", " + price + ", " + quantity);
                    var itemPrice = price * quantity;
                    totalPrice += itemPrice;
                    items.push({
                        'product_id': product_id,
                        'quantity': quantity
                    });
                }
            }
            const customerName = $('#customerName').val();
            const centerName = $('#centerName').val();
            const data = {
                'customerName': customerName,
                'centerName': centerName,
                'totalPrice': totalPrice,
                'items': items
            }
            $.ajax({
                url: '{{route('admin.order.send')}}',
                type: 'POST',
                dataType: 'json',
                data: JSON.stringify(data),
                contentType: "application/json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    window.location.href = '{{ route('admin.order.direct') }}';
                },
                error: function (xhr, status, error) {
                    // Handle any errors that occurred during the request
                    console.log(error);
                }
            });

        }
    </script>
@endsection
