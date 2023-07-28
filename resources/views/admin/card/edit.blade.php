@extends('admin._layout')
@section('content')
<div class="container ">
    <div class="row justify-content-center" >  
    <div class="col-7">
    <form action="/admin/cards/edit/{{$card['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <label>إسم البطاقة </label>
        <input type="text" name="name" class="form-control" value="{{$card['name']}}">
        <br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>سعر البطاقة</label>
        <input type="float" name="price" class="form-control" value="{{$card['price']}}" >
        <br>
        @error('price')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>قسم البطاقة</label>
        <select  name="category_id" class="form-control" >
            @foreach ($category as $item)
                <option value="{{ $item['id'] }}" @if ($item['id'] === $card['category_id']) selected @endif>{{ $item['name'] }}</option>
             @endforeach
        </select>
        <br>
        @error('category_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label>قيمة الخصم (%)</label>
        <input type="number" name="discount" class="form-control" value="{{$card['discount']}}">
        <br>
        @error('discount')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label> التواجد</label>
        <select  name="avilability" class="form-control" >
            <option value="1" @if (1 === $card['avilability']) selected @endif >متواجد</option>
            <option value="0" @if (0=== $card['avilability']) selected @endif>غير متواجد</option>

        </select>
        <br>
        @error('avilability')
                <small class="text-danger">{{$message}}</small>
            @enderror
        <br>
        <label> الصورة الحالية</label>
        <img style="width: 80px;height:80px"  src="{{ asset('storage/'. $card['image']) }}"/>

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