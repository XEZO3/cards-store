@extends('admin._layout')
@section('content')

<style>
    *{
        margin: 0px;
        padding: 0px;
    }
    .container{
        box-shadow: 5px 5px 5px;
    }
</style>

<div class="container border rounded ">
    <form action="/admin/login" method="post">
        @csrf
        <div class="login-box">
        <h1 style="text-shadow: 1px 1px">تسجيل الدخول</h1>
        <div class="mb-3">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" class="form-control" name="email" placeholder="example@email">
            </div>
            <div class="mb-3">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" name="password" class="form-control" placeholder="password">
            </div>
        <input class="button" type="submit" name="login" value="تسجيل">
         </div>
        </form>   
</div>
 

@endsection