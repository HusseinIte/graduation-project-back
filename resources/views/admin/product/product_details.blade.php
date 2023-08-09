@extends('layouts.admin')

@section('title')
    تفاصيل منتج
@endsection

@section('contentheader')
    تفاصيل منتج
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.product.index')}}">المنتجات</a>
@endsection

@section('contentheaderactive')
    تفاصيل
@endsection
@section('PActive')
    active
@endsection
@section('content')
    <div class="row justify-content-center text-cyan text-bold"
         style="margin-bottom:10px;">{{$product->manufactureCompany}}</div>
    <div class="row justify-content-center">
        <div class=" col-4">
            <img src="{{route('ProductImage',$product->id)}}" class="product-image img-bordered img-circle"
                 alt="Product Image">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-header border">
                <h3 class="card-title float-left">مواصفات المنتج</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table  table-bordered">
                    @if ($product->category->name == "إطارات")
                        <tr>
                            <th class="col-4">نوع الإطار</th>
                            <td>{{$product->frameAttribute->frameType}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">القياس</th>
                            <td>{{$product->frameAttribute->size}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">الذراع</th>
                            <td>{{$product->frameAttribute->arm}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">الجسر</th>
                            <td>{{$product->frameAttribute->bridge}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">شكل الإطار</th>
                            <td>{{$product->frameAttribute->frameShape}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">الفئة</th>
                            <td>{{$product->frameAttribute->frameClass}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">اللون</th>
                            <td>{{$product->frameAttribute->color}}</td>
                        </tr>
                    @elseif($product->category->name == "عدسات")
                        <tr>
                            <th class="col-4">Spherical</th>
                            <td>{{$product->lensesAttribute->spherical}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">Cylinder</th>
                            <td>{{$product->lensesAttribute->cylinder}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">نوع العدسة</th>
                            <td>{{$product->lensesAttribute->lensesClass}}</td>
                        </tr>
                        <tr>
                            <th class="col-4">فئة النوع</th>
                            <td>{{$product->lensesAttribute->classType}}</td>
                        </tr>
                    @else
                        <tr>
                            <th class="col-4">تفاصيل الجهاز</th>
                            <td>{{$product->deviceAttribute->details}}</td>
                        </tr>
                    @endif
                    <tr>
                        <th class="col-4">الكمية</th>
                        <td>{{$product->amount}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">السعر</th>
                        <td>{{$product->price}}</td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection



