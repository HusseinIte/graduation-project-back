@extends('layouts.admin')

@section('title')
    تفاصيل زبون
@endsection

@section('contentheader')
    تفاصيل زبون
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.product.index')}}">الزبائن</a>
@endsection

@section('contentheaderactive')
    تفاصيل
@endsection
@section('CustomerActive')
    active
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card-header border">
                <h3 class="card-title" style="margin:0 40%">تفاصيل الزبون</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table  table-bordered">
                    <tr>
                        <th class="col-4">ID</th>
                        <td>{{$customer->id}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">الاسم الأول</th>
                        <td>{{$customer->firstName}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">الاسم الأخير</th>
                        <td>{{$customer->lastName}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">اسم المركز</th>
                        <td>{{$customer->centerName}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">المدينة</th>
                        <td>{{$customer->city}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">العنوان بالتفصيل</th>
                        <td>{{$customer->address}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">الهاتف</th>
                        <td>{{$customer->phone}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">الموبايل</th>
                        <td>{{$customer->mobile}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">الايميل</th>
                        <td>{{$customer->user->email}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">تاريخ الإضافة</th>
                        <td>{{$customer->created_at}}</td>
                    </tr>
                    <tr>
                        <th class="col-4">تاريخ التعديل</th>
                        <td>{{$customer->updated_at}}</td>
                    </tr>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection



