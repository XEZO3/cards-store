@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/payment/edit/{{$payment['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>الاسم</label>
        <input type="text" name="name" class="form-control" value="{{$payment['name']}}">
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>رقم المحفظة</label>
        <input type="text" name="wallet" class="form-control" value="{{$payment['wallet']}}">
        <br>
        @error('wallet')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>عمولة التحويل</label>
        <input type="float" name="ex_price" class="form-control" value="{{$payment['ex_price']}}">
        <br>
        @error('ex_price')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>الصورة </label>
        <img style="width: 80px;height:80px"  src="{{ asset('storage/'. $payment['image']) }}"/>
        <input type="file" class="form-control" name="image">
        <br>
        @error('image')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <input type="submit" class="btn btn-primary" name="form-control">
        </form><br><br>
    </div>
</div>
</div>
@endsection