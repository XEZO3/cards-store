@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/category/add" method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم التصنيف </label>
        <input type="text" name="name" class="form-control" placeholder="اسم التصنيف">
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
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