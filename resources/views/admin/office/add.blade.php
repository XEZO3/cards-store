@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/office/add" method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم المكتب </label>
        <input type="text" name="name" class="form-control">
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>إسم المستلم </label>
        <input type="text" name="reciver_name" class="form-control">
        <br>
        @error('reciver_name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
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