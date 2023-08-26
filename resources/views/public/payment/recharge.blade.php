@extends('public._layout')
@section('content')
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div style="
    width: 50%;
    left: 25%;
    position: relative;
    height: fit-content;
    border: 1px solid rgba(0,0,0,.125);
    text-align: right;
    border-radius: 5px;
    font-family:tahoma;
">
<form action="/payment/recharge" method="post">

    @csrf
<div style="
    border: 1px solid rgba(0,0,0,.125);
    height: 40px;
    background-color: #edeaea;
    padding: 0px 15px;
">شحن رصيد</div>
    <div><div style="
    direction: rtl;
    padding: 0px 15px;
">
<label>الرمز</label><br>
<input type="text" name="code" maxlength="16" onkeyup="this.value = this.value.toUpperCase();" style="
    width: 100%;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 5px;
    padding: 3px 0px;
"><br>
<br>
<input type="submit" value="إضافة" style="
    width: 100%;
    padding: 7px;
    background-color: #007bff;
    border: none;
    color:white;
    border-radius: 5px;
    margin-bottom: 10px; cursor:pointer"></div></div></form>
</div>
@endsection