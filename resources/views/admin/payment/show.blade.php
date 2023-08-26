@extends('admin._layout')
@section('content')
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
  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الصورة</th>
            <th scope="col">###</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($category as $index=>$item)
                
           
          <tr>
            <th scope="row">{{$index+1}}</th>
            <td ><div class="mt-4">{{$item['name']}}</div></td>
            <td><img style="width: 80px;height:80px"  src="{{ asset('storage/'. $item['image']) }}"/></td>
            <td>
                <div class="d-flex flex-row mt-4">
                    <div ><a href="/admin/category/edit/{{$item['id']}}"  class="btn btn-primary">
                      <i style="color: white" class="material-icons ">تعديل</i>
                    </a></div>
                    <div ><a href="/admin/category/delete/{{$item['id']}}" class="btn btn-danger mr-1">
                      <i class="material-icons" style="color: white">حذف</i>
                    </a></div>
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/admin/category/add" class="btn btn-primary" style="color: white"> اضافة المزيد</a>
</div>


  
@endsection