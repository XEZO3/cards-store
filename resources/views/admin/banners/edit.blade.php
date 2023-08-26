@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/banners/edit/{{$banner['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>صورة التصنيف</label>
        <img style="width: 80px;height:80px"  src="{{ asset('storage/'. $banner['image']) }}"/>
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