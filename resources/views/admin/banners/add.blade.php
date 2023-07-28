@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/banners/add" method="post" enctype="multipart/form-data">
        @csrf
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