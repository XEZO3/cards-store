@extends('admin._layout')
@section('content')
<div class="container" style="max-height: 800px;overflow-y:scroll">
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
            <th scope="col">الصورة</th>
            <th scope="col">الاسم</th>
            <th scope="col">السعر</th>
            <th scope="col">القسم</th>
            <th scope="col">قيمة الخصم %</th>
            <th scope="col">يتطلب رقم لاعب</th>
            <th scope="col">التواجد</th>
            <th scope="col">###</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($card as $index=>$item)
                
           
          <tr>
            <th scope="row">{{$index+1}}</th>
            <td><img style="width: 80px;height:80px"  src="{{ asset('storage/'. $item['image']) }}"/></td>
            <td ><div class="mt-4">{{$item['name']}}</div></td>
            <td><div class="mt-4">{{$item['price']}}</div></td>
            <td><div class="mt-4">{{$item['category']['name']}}</div></td>
            <td><div class="mt-4">{{$item['discount']}}</div></td>
            <td><div class="mt-4">{{$item['require_id']==1?"نعم":"لا"}}</div></td>
            <td><div class="mt-4">{{$item['avilability']==1?"متواجد":"غير متواجد"}}</div></td>
            <td>
                <div class="d-flex flex-row mt-4">
                    <div ><a href="/admin/cards/edit/{{$item['id']}}"  class="btn btn-primary">
                      <i style="color: white" class="material-icons ">تعديل</i>
                    </a></div>
                    <div ><a href="/admin/cards/delete/{{$item['id']}}" class="btn btn-danger mr-1">
                      <i class="material-icons" style="color: white">حذف</i>
                    </a></div>
                  </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/admin/cards/add" class="btn btn-primary" style="color: white"> اضافة المزيد</a>
      <a href="/admin/keys/" class="btn btn-warning" style="color: white"> اضافة اكواد بطاقات</a>
</div>


  
@endsection