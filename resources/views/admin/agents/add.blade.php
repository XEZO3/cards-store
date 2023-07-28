@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/agents/add" method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم الوكيل </label>
        <input type="text" name="name" class="form-control" >
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>

        <label> رقم الهاتف </label>
        <input type="text" name="phone_number" class="form-control" >
        <br>
        @error('phone_number')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>الفئة</label>
        <input type="text" name="type" class="form-control" >
        <br>
        @error('type')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>المنطقة</label>
        <input type="text" name="country" class="form-control" >
        <br>
        @error('country')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <input type="submit" name="form-control">
        </form><br><br>
    </div>
</div>
</div>
@endsection