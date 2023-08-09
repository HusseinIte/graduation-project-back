@extends('layouts.admin')

@section('title')
    الموظفين
@endsection

@section('contentheader')
    الموظفين
@endsection

@section('contentheaderactive')
    الموظفين
@endsection
@section('empActive')
    active
@endsection
@section('content')
    <div class="card-footer clearfix">
        <a href="{{route('admin.employee.create')}}" class="btn btn-secondary float-left"><i class="fas fa-plus"></i>إضافة
            موظف</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-image">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">اسم الموظف</th>
                        <th scope="col">المهام</th>
                        <th scope="col">الإيميل</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{$employee->id}}</th>
                            <td scope="row">{{$employee->first_name." ".$employee->last_name}}</td>
                            <td>{{$employee->user->userType->type}}</td>
                            <td>{{$employee->user->email}}</td>
                            <td>
                                <a href="{{route('admin.employee.edit',$employee->id)}}" class="btn btn-app btn-sm"><i
                                        class="fas fa-edit"></i>تعديل</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

