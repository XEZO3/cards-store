@extends('public._layout')
@section('content')
<style>
    .modal-backdrop {
 
  
 z-index: -1;
}
.paragraph-content {
  white-space: pre-wrap;
}
.all{
overflow-x: scroll;
    display: grid;
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
<table class="agent" style="
    margin: 0px !important;
    width: 100%;
    text-align: center;
    direction: rtl;
">
<tbody><tr>
    <td class="namea">رقم الطلب</td>
    <td class="phonea">المنتج</td>
    <td class="cata">اللاعب/المشترك</td>
    <td class="regiona">المجموع</td>
    <td class="quentity">الكمية</td>
    <td class="regiona">التاريخ</td>
    <td class="regiona">الحالة</td>
    <td class="regiona">سبب الرفض|ان وجد</td>
    <td class="regiona">##</td>

    </tr>
    @foreach($orders as $item)
    <tr><td><br></td></tr>
    <tr style="
    background: #e0e0e0;
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    box-shadow: 0 1px 3px 0px #0000000f;
    width: 100% !important;
    height: 70px;
    ">
    <td class="allb">{{$item['order_id']}}</td><!---->
    <td class="allb">{{$item['card']['name']}}</td>
    <td class="allb">{{$item['game_id']}}</td>
    <td class="allb">{{$item['total']}}</td>
    <td class="allb">{{$item['quentity']}}</td>
    <td class="allb">{{$item['created_at']}}</td>
    <td class="allb">{{$item['state']=="pending" ? "قيد الانتظار" : ($item['state']=="done" ? "تمت العملية" : "تم الالغاء")}}</td>
    <td class="allb">{{$item['rejecte_cause']}}</td>
    <td class="allb">
        @if($item['state']=="done" && $item['card']['require_type']==0)
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#so{{$item['id']}}s">
          <i class="fa-solid fa-eye"></i>
          </button>
        @elseif($item['state']=="pending")
        <a onclick="check('/orders/cancel/{{$item['id']}}')" class="btn btn-danger" >
          <i class="fa-solid fa-ban"></i>
        </a>
        @endif
    </td>
    @if($item['state']=="done" && $item['card']['require_type']==0)
        <div class="modal fade" id="so{{$item['id']}}s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">البطاقات</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container" style="overflow-y: scroll">
                        <p class="paragraph-content" style="text-align: center">{{strip_tags(nl2br($item['keys']))}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          @endif
        </tr>
    <tr><td><br></td></tr>
   @endforeach
</tbody></table>
<script>
  function check(direction){
    var confirmation = confirm("هل انت متاكد من هذه العملية؟");
    if(confirmation)
    window.location.href = direction
}
</script>
  @endsection