@extends('public._layout')
@section('content')
<link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-17/css/style.css">
<section class="ftco-section">
<div class="container">

<div class="row justify-content-center">
<div class="col-md-12 col-lg-10">
<div class="wrap d-md-flex">
<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last" style="padding: 0px !important;display: flex !important;flex-direction: column;justify-content: center;background-image: url(https://imagizer.imageshack.com/img924/8004/Py5GSt.png);
    background-repeat: round;">
<div style="margin-top: 10px;"><img src="{{asset("storage/".$info['logo'])}}" style="
    width: 50%;
"></div><div class="text w-100" style="">

<h2 style="
">تسجيل الدخول</h2>


</div>
</div>
<div class="login-wrap p-4 p-lg-5">

<form action="" class="signin-form" method="post">
    @csrf
<div class="form-group mb-3">
<label class="label" for="name" style="
    font-family: tahoma;
    letter-spacing: 0px !important;
    float: right;
    font-size: 14px;
">البريد الالكتروني</label>
<input type="email"  name="email" class="form-control" placeholder="البريد الالكتروني" required="">
 @error('email')
         <small class="text-danger">{{$message}}</small>
@enderror
</div>
<div class="form-group mb-3">
<label class="label" for="password" style="
    letter-spacing: 0px !important;
    font-family: tahoma;
    float: right;
    font-size: 14px;
">كلمة المرور</label>
<input type="password" name="password" class="form-control" placeholder="كلمة المرور" required="">
 @error('password')
         <small class="text-danger">{{$message}}</small>
@enderror
</div>
<div class="form-group">
<div style="
    display: flex;
    width: 100%;
		justify-content: center;
">
    
    <div class="form-group" style="
    width: 44%;
    margin-right: 10px;
">
<button type="submit" class="form-control btn btn-primary submit px-3" style="
    font-size: 16px;
    font-weight: 900;
">دخول</button>
</div>
<div class="form-group" style="
    width: 44%;
">
<a target="_blank" href="https://wa.me/{{$info['phone_number']}}?text=اريد انشاء حساب جديد" class="btn btn-white btn-outline-white" style="
    background: linear-gradient(135deg, #f75959 0%, #f35587 100%);
    font-size: 14px;
    font-weight: 600;
    padding: 0px;
    width: -webkit-fill-available;
"><span  class="form-control btn btn-primary submit px-3" style="
    font-size: 16px;
    font-weight: 900;
">التسجيل</span></a>
</div></div>
</div>
<style>
    .btn:not(:disabled):not(.disabled) {background:#007bff;border-color: #007bff;}
</style>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection