@extends('layouts.admin')

@section('title')
    الزبائن
@endsection

@section('contentheader')
    الزبائن
@endsection

@section('contentheaderactive')
    الزبائن
@endsection
@section('CustomerActive')
    active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-image">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">اسم الزبون</th>
                        <th scope="col">اسم المركز</th>
                        <th scope="col">الموبايل</th>
                        <th scope="col">الهاتف</th>
                        <th scope="col">العنوان</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{$customer->id}}</th>
                            <th scope="row">{{$customer->firstName." ".$customer->lastName}}</th>
                            <td>{{$customer->centerName}}</td>
                            <td>{{$customer->mobile}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>
                                <button type="button" class="btn btn-block btn-secondary">عرض الطلبات</button>
                            </td>
                            <td>
                                <a href="{{route('admin.customer.details',$customer->id)}}"
                                   class="btn btn-block btn-secondary">تفاصيل</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


