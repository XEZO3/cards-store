@extends('admin._layout')
@section('content')

<style>
    .modal-backdrop {
 
  
 z-index: -1;
}
.paragraph-content {
  white-space: pre-wrap;
}
</style>
{{-- <div style="
    direction: rtl;
    float:right;
">
<form action="" method="">
<label style="/* font-family: tahoma; *//* font-size: 16px; */">البحث عن طريق رقم الطلبية</label>
<input type="number" style="
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 5px;
    padding: 2px;
">
<input type="submit" style="
    border-radius: 5px;
    padding: 3px;
    background-color: #007bff;
    border: none;cursor:pointer;
    color:white
    " value="ابحث"></form></div> --}}
<br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
اضافة كود    
</button>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/zipcode/create" method="POST">
            @csrf
          <div class="mb-3">
            <label for="">الكمية</label>
            <input type="number" min="1" name="amount" class="form-control" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>


<table class="agent" style="
    margin: 0px !important;
    width: 100%;
    text-align: center;
    direction: rtl;
">
<tbody><tr>
    <td class="phonea">#</td>
    <td class="phonea">الكود</td>
    <td class="cata">الكمية</td>
    <td class="regiona">الحالة</td>
    <td class="regiona">###</td>

    </tr>
    @foreach($codes as $index=>$item)
    <tr><td><br></td></tr>
    <tr style="
    background: #e0e0e0;
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    box-shadow: 0 1px 3px 0px #0000000f;
    width: 100% !important;
    height: 70px;
    ">
    <td class="allb">{{$index+1}}</td><!---->
    <td class="allb">{{$item['code']}}</td><!---->
    <td class="allb">{{$item['amount']}}</td>
    <td class="allb">{{$item['validity']==1 ? "فعال":"غير فعال"}}</td>
    <td class="allb">
        <a class="btn btn-danger" href="/admin/zipcode/delete/{{$item['id']}}">حذف</a>
    </td>

        </tr>
    <tr><td><br></td></tr>
   @endforeach
</tbody></table>

  @endsection