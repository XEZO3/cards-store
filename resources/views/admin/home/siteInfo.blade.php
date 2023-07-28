@extends('admin._layout')
@section('content')

<div class="container ">
    <div class="row justify-content-center" onload="dis()">  
    <div class="col-7">
    <form action="/admin/info/update/{{$siteInfo['id']}}"  method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم الموقع </label>
        <input type="text" name="name" class="form-control" value="{{$siteInfo['name']}}">
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>رقم التواصل</label>
        <input type="text" name="phone_number" class="form-control mos" value="{{$siteInfo['phone_number']}}">
        <br>
        @error('phone_number')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>البريد الالكتروني</label>
        <input type="text" name="email"  class="form-control tes" value="{{$siteInfo['email']}}">
        <br>
        @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>شعار الموقع</label>
        <img style="width: 80px;height:80px"  src="{{ asset('storage/'. $siteInfo['logo']) }}"/>
        <input type="file" class="form-control tes" name="image">
        <br>
        @error('image')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <button type="submit" id="hide" class="btn btn-primary">حفظ التعديلات</button>
        </form><br>
        <button class="btn btn-primary" id="edit" onclick="appere()">تعديل</button>
        <button class="btn btn-danger" id="cancel" onclick="disappere()">الغاء</button>
        <br>
    </div>
</div>
</div>
<script>
    var elements = document.getElementsByClassName("form-control");
        for (var i = 0; i < elements.length; i++) {
            elements[i].disabled = true;
        }
        document.getElementById("hide").style.visibility = "hidden"
        document.getElementById("cancel").style.visibility = "hidden"

        function appere(){
            var elements = document.getElementsByClassName("form-control");
        for (var i = 0; i < elements.length; i++) {
            elements[i].disabled = false;
        }
        document.getElementById("hide").style.visibility = "visible"
        document.getElementById("edit").style.visibility = "hidden"
        document.getElementById("cancel").style.visibility = "visible"

        }
        function disappere(){
            var elements = document.getElementsByClassName("form-control");
        for (var i = 0; i < elements.length; i++) {
            elements[i].disabled = true;
        }
        document.getElementById("hide").style.visibility = "hidden"
        document.getElementById("edit").style.visibility = "visible"
        document.getElementById("cancel").style.visibility = "hidden"

        }
    </script>
@endsection