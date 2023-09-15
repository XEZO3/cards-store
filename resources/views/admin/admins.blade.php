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
            <th scope="col">الايميل</th>
            <th scope="col">####</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($users as $index=>$item)
                
           
          <tr>
            <th scope="row">{{$index+1}}</th>
            <td >{{$item['name']}}</td>
            <td>{{$item['email']}}</td>
            <td>
                <div class="d-flex flex-row ">
                  @if($item['email']!="superadmin@gmail.com")
                    <div ><a href="/admin/users/delete/{{$item['id']}}" class="btn btn-danger mr-1">
                      <i class="material-icons" style="color: white">حذف</i>
                    </a></div>
                    @endif
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/admin/register" class="btn btn-primary" style="color: white"> اضافة المزيد</a>
</div>


  
@endsection