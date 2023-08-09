@extends('layouts.admin')

@section('title')
    تعديل موظف
@endsection

@section('contentheader')
    تعديل موظف
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.employee.index')}}">الموظفين</a>
@endsection

@section('contentheaderactive')
    تعديل
@endsection
@section('empActive')
    active
@endsection
@section('content')
    <div class="card card-secondary col-8" style="padding:0;">
        <div class="card-header">
            <h3 class="card-title float-left">تعديل موظف</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.employee.update',$employee->id)}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="firstName">الإسم الأول</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           placeholder="الإسم الأول" value="{{$employee->first_name}}">
                </div>
                <div class="form-group">
                    <label for="lastName">الإسم الأخير</label>
                    <input type="text" class="form-control" name="last_name" id="last_name"
                           placeholder="الإسم الثاني" value="{{$employee->last_name}}">
                </div>
                <div class="form-group">
                    <label>نوع الموظف</label>
                    <select id="user_type_id" name="user_type_id" class="form-control">
                        <option value="1" @if($employee->user->user_type_id ==1)selected @endif>مستودع</option>
                        <option value="2" @if($employee->user->user_type_id ==2)selected @endif>عامل توصيل</option>
                        <option value="3" @if($employee->user->user_type_id ==3)selected @endif>صيانة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputEmail">البريد الإلكتروني</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="أدخل الايميل"
                           value="{{$employee->user->email}}">
                </div>
                <div class="form-group">
                    <label for="InputPassword">كلمة المرور</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="كلمة المرور" value="{{($employee->user->password)}}">
                </div>
                <!-- textarea -->
                <div class="form-group">
                    <label>ملاحظة</label>
                    <textarea id="note" name="note" class="form-control" rows="3"
                              placeholder="أدخل ملاحظة ..." value="{{$employee->note}}"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-secondary">تعديل</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

