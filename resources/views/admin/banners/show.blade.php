@extends('admin._layout')
@section('content')
<style>
  .animate-fading{animation:fading 5s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
  .mySlides{
            max-width: 100%;
        }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        </div>
    </div>
    <div class="container-fluid">
      <div class="row  justify-content-center">
        @foreach($banners as $item)
      <img alt="banner image" class="mySlides animate-fading" src="{{ asset('storage/'. $item['image']) }}" style="width:100%; max-height:370px">
        @endforeach
    </div>
      </div>

  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الصورة</th>
            <th scope="col">###</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($banners as $index=>$item)
                
           
          <tr>
            <th scope="row">{{$index+1}}</th>
            <td><img style="width: 80px;height:80px"  src="{{ asset('storage/'. $item['image']) }}"/></td>
            <td>
                <div class="d-flex flex-row mt-4">
                    <div ><a href="/admin/banners/edit/{{$item['id']}}"  class="btn btn-primary">
                      <i style="color: white" class="material-icons ">تعديل</i>
                    </a></div>
                    <div ><a href="/admin/banners/delete/{{$item['id']}}" class="btn btn-danger mr-1">
                      <i class="material-icons" style="color: white">حذف</i>
                    </a></div>
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/admin/banners/add" class="btn btn-primary" style="color: white"> اضافة المزيد</a>
</div>


  
@endsection