@extends('admin._layout')
@section('content')
<div class="container border rounded ">

    <div class="adminbody">
        <form action="/admin/register" method="post" enctype="multipart/form-data">
            @csrf
            <label>إسم المستخدم</label>
            <input type="text" name="name" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
            <br>
            @error('ىشةث')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            <label>البريد الالكتروني</label>
            <input type="email" name="email" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
            <br>
            @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            <label>كلمة السر</label>
            <input type="password" name="password" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
            <br>
            @error('password')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            <label> اعد كلمة السر</label>
            <input type="password" name="password_confirmation" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
            <br>
            @error('password_confirmation')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>       
            <input type="submit" value="إضافة مسؤول">
            </form>
        </div>
</div>

@endsection