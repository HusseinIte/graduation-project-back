@extends('layouts.admin')

@section('title')
    إضافة موظف
@endsection

@section('contentheader')
    إضافة موظف
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.employee.index')}}">الموظفين</a>
@endsection

@section('contentheaderactive')
    إضافة
@endsection
@section('empActive')
    active
@endsection
@section('content')
    <div class="card card-secondary col-8" style="padding:0;">
        <div class="card-header">
            <h3 class="card-title float-left">إضافة موظف</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('admin.employee.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="firstName">الإسم الأول</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           placeholder="الإسم الأول">
                </div>
                <div class="form-group">
                    <label for="lastName">الإسم الأخير</label>
                    <input type="text" class="form-control" name="last_name" id="last_name"
                           placeholder="الإسم الثاني">
                </div>
                <div class="form-group">
                    <label>نوع الموظف</label>
                    <select id="user_type_id" name="user_type_id" class="form-control">
                        <option value="1">مستودع</option>
                        <option value="2">عامل توصيل</option>
                        <option value="3">صيانة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputEmail">البريد الإلكتروني</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="أدخل الايميل">
                </div>
                <div class="form-group">
                    <label for="InputPassword">كلمة المرور</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="كلمة المرور">
                </div>
                <!-- textarea -->
                <div class="form-group">
                    <label>ملاحظة</label>
                    <textarea id="note" name="note" class="form-control" rows="3"
                              placeholder="أدخل ملاحظة ..."></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-secondary">إضافة</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

