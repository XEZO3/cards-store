@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/cards/add" method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم البطاقة </label>
        <input type="text" name="name" class="form-control" >
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>سعر البطاقة</label>
        <input type="float" name="price" class="form-control" >
        <br>
        @error('price')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>قسم البطاقة</label>
        <select  name="category_id" class="form-control" >
            @foreach ($category as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
            @endforeach
        </select>
        <br>
        @error('category_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>قيمة الخصم (%)</label>
        <input type="number" name="discount" class="form-control" >
        <br>
        @error('discount')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label> التواجد</label>
        <select  name="avilability" class="form-control" >
            <option value="1">متواجد</option>
            <option value="0">غير متواجد</option>

        </select>
        <br>
        @error('avilability')
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