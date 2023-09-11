@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/news/edit/{{$news['id']}}" method="post" >
        @csrf
        <label>الخبر</label>
        <textarea type="text" name="news" class="form-control" >{{$news['news']}}</textarea>
        <br>
        @error('news')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <input type="submit" name="form-control" value="حفظ التعديلات">
        </form><br><br>
    </div>
</div>
</div>
@endsection