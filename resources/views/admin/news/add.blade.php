@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/news/add" method="post" enctype="multipart/form-data">
        @csrf
        <label>الخبر</label>
        <textarea type="text" name="news" class="form-control" ></textarea>
        <br>
        @error('news')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <input type="submit" class="btn btn-primary">
        </form><br><br>
    </div>
</div>
</div>
@endsection