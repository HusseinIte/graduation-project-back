@extends('layouts.admin')

@section('title')
    العروض
@endsection

@section('contentheader')
    العروض
@endsection

@section('contentheaderactive')
    العروض
@endsection
@section('OfferActive')
    active
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('input[name="start_date"]').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                singleDatePicker: true,
                locale: {
                    format: 'MM/DD/YYYY h:mm A'
                }
            });
            $('input[name="end_date"]').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                singleDatePicker: true,
                locale: {
                    format: 'MM/DD/YYYY h:mm A'
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="container">
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
                    @foreach($products as $product)
                        <tr>
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
                                <a class="btn btn-app btn-sm" data-toggle="modal"
                                   data-target="#exampleModal" data-whatever="@mdo"><i
                                        class="fas fa-plus-circle"></i></a>
                                <a href="#" class="btn btn-app btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-app btn-sm"><i
                                        class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('admin.offer.addDiscount')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة عرض</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">نسبة الخصم</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="daterange" class="col-form-label"> بداية العرض</label>
                            <input class="pull-right form-control" type="text" name="start_date" id="start_date"
                                   value="01/01/2015 1:30 PM"/>
                        </div>
                        <div class="form-group">
                            <label for="daterange" class="col-form-label"> نهاية العرض</label>
                            <input class="pull-right form-control" type="text" name="end_date" id="end_date"
                                   value="01/01/2015 1:30 PM"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


