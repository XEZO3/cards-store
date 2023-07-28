@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/office/edit/{{$office['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم التصنيف </label>
        <input type="text" name="name" class="form-control" value="{{$office['name']}}">
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>إسم المستلم </label>
        <input type="text" name="reciver_name" class="form-control" value="{{$office['reciver_name']}}">
        <br>
        @error('reciver_name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>

        <label>صورة التصنيف</label>
        <img style="width: 80px;height:80px"  src="{{ asset('storage/'. $office['image']) }}"/>
        <input type="file" name="image">
        <br>
        @error('image')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <input type="submit" name="form-control">
        </form><br><br>
    </div>
</div>
</div>
@endsection