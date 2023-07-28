@extends('admin._layout')
@section('content')

<div class="container ">
    <div class="row justify-content-center" onload="dis()">  
    <div class="col-7">
    <form action="/admin/service/update/{{$siteInfo['id']}}"  method="post" enctype="multipart/form-data">
        @csrf
        <label>شروط الخدمة</label>
        <textarea type="text" style="min-height: 400px" name="service" class="form-control">{{strip_tags(nl2br($siteInfo['service']))}}</textarea>
        <br>
        @error('service')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
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