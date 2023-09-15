@extends('admin._layout')
@section('content')
<div class="container-fluid" style="overflow-x:scroll">
    <div class="row">
        <div class="col">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        </div>
    </div>
  
    <table class="table" style="overflow-x:scroll">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الهاتف</th>
            <th scope="col">الفئة</th>
            <th scope="col">المنطقة</th>
            <th scope="col">####</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($agents as $index=>$item)
                
           
          <tr>
            <th scope="row">{{$index+1}}</th>
            <td >{{$item['name']}}</td>
            <td>{{$item['phone_number']}}</td>
            <td>{{$item['type']}}</td>
            <td>{{$item['country']}}</td>
            <td>
                <div class="d-flex flex-row ">
                    <div ><a href="/admin/agents/edit/{{$item['id']}}"  class="btn btn-primary">
                      <i style="color: white" class="material-icons ">تعديل</i>
                    </a></div>
                    <div ><a href="/admin/agents/delete/{{$item['id']}}" class="btn btn-danger mr-1">
                      <i class="material-icons" style="color: white">حذف</i>
                    </a></div>
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/admin/agents/add" class="btn btn-primary" style="color: white"> اضافة المزيد</a>
</div>


  
@endsection