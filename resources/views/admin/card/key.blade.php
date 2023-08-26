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
          <h5 class="modal-title" id="exampleModalLabel">اضافة بطاقة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/keys/create" method="POST">
            @csrf
          <div class="mb-3">
            <label for="">البطاقة</label>
            <select class="form-control" name="card_id">
              <option value="">--اختر قيمة----</option>
              @foreach ($cards as $item)
                
                <option value="{{$item['id']}}">{{$item['name']}}</option>
              @endforeach
            </select>
            @error('card_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
            <br>
            <label for="">الرمز</label>
            <textarea rows="10" cols="45" min="1" name="key" class="form-control" ></textarea>
            @error('key')
            <br>
            <small class="text-danger">{{$message}}</small>
        @enderror
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
    <td class="phonea">البطاقة</td>
    <td class="cata">الرمز</td>
    <td class="regiona">الحالة</td>
    <td class="regiona">###</td>

    </tr>
    @foreach($keys as $index=>$item)
    <tr><td><br></td></tr>
    <tr style="
    background: #e0e0e0;
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    box-shadow: 0 1px 3px 0px #0000000f;
    width: 100% !important;
    height: 70px;
    ">
    <td class="allb">{{$index+1}}</td><!---->
    <td class="allb">{{$item['card']['name']}}</td><!---->
    <td class="allb">{{$item['key']}}</td>
    <td class="allb">{{$item['avilability']==1 ? "فعال":"غير فعال"}}</td>
    <td class="allb">
        <a class="btn btn-danger" href="/admin/keys/delete/{{$item['id']}}">حذف</a>
    </td>

        </tr>
    <tr><td><br></td></tr>
   @endforeach
</tbody></table>

  @endsection