@extends('admin._layout')
@section('content')
<style>
.modal-backdrop {
   z-index: -1;
}
</style>

<div class="container-fluid mt-4">
    <!-- Order cart -->
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-auto">
          <input type="text" style="min-width:150px" class="form-control" id="order_id" placeholder="رقم الطلب">
        </div>
        <div class="col-auto">
          <button onclick="search()" class="btn btn-primary">بحث</button>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        الطلبات
      </div>
      <div class="card-body">
        <ul class="list-group"  style="overflow-x:scroll">
          @foreach ($orders as $order)
            <li id="s{{$order['order_id']}}" class="list-group-item"  style="overflow-x:scroll" >
              <div class="d-flex justify-content-between">
                <span style="background-color:lightgrey;color:black"> Order #{{ $order['order_id']}}- Customer: {{ $order['User']['name'] }}</span>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#orderItems{{ $order->id }}" aria-expanded="false" aria-controls="orderItems{{ $order->id }}">
                 عرض الطلب
                </button>
              </div>
              <div class="collapse" id="orderItems{{ $order->id }}">
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th> اسم المنتج</th>
                      <th>الكمية</th>
                      @if($order['card']['require_type']==1 )
                      <th>رقم اللاعب</th>
                      @elseif($order['card']['require_type']==2)
                      <th>اسم المستخدم او الايميل</th>
                      <th>كلمة المرور</th>
                      @endif
                      <th>مجموع</th>
                      <th>الحالة</th>
                      <th>البطاقات</th>
                      @if($order['state']=="rejected")
                      <th>سبب الرفض</th>
                      @endif
                      @if($order['card']['require_type']==0 && $order['state']=="pending")
                      <th>#</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>{{ $order['card']['name'] }}</td>
                      <td>{{ $order['quentity'] }}</td>
                      @if($order['card']['require_type']==1 )
                      <td>{{$order['game_id']}}</td>
                      @elseif($order['card']['require_type']==2)
                      <td>{{$order['username']}}</td>
                      <td>{{$order['password']}}</td>
                      @endif
                      <td>{{ $order['total']}}</td>
                      <td>{{ $order['state'] === 'pending' ? 'قيد الانتظار' : ($order['state'] === 'rejected' ? 'تم الرفض' : ($order['state'] === 'done' ? 'تمت العملية' : 'حالة غير معروفة')) }}</td>
                      <td>
                        @if($order['card']['require_type']!=0 && $order['state']=="pending")
                        <a href="/admin/order/setstate/{{$order['id']}}/done" style="color:white" class="btn btn-success">تمت العملية</a>
                        <a data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#reject{{$order['id']}}">الرفض</a>
                        @elseif($order['state']=="pending") 
                          <form method="post" action="/admin/keys/addkeytouser/{{$order['id']}}">
                            @csrf
                            <textarea id="textarea{{$order['id']}}" name="keys" class="form-control" cols="30" rows="10" disabled></textarea>
                            <button id="edita{{$order['id']}}" onclick="edit({{$order['id']}})" type="button" class="btn btn-primary">تعديل</button>
                            <button  type="submit" class="btn btn-primary" id="savea{{$order['id']}}" style="display: none">حفظ</button>
                          </form>  
                        @endif
                      </td>
                      @if($order['state']=="rejected")
                      <td>{{$order['rejecte_cause']}}</td>
                      @endif
                      @if($order['card']['require_type']==0 && $order['state']=="pending")
                      <td><a style="color:white" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#reject{{$order['id']}}">الرفض</a></td>
                      @endif
                      <!-- Modal -->
                      <div class="modal fade" id="reject{{$order['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">سبب الرفض</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                              <form action="/admin/order/setstate/{{$order['id']}}/rejected" onsubmit="return check()">
                                <textarea name="rejecte_cause" class="form-control" cols="30" rows="10" ></textarea>
                                @error('rejecte_cause')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                              <button type="submit" class="btn btn-primary">اتمام العملية</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--modal end-->                     
                    </tr>
                  </tbody>
                </table>
              </div>
            </li>
          @endforeach
          
        </ul>
      </div>
    </div>
  </div>
<script>
  function search(){
    var id = document.getElementById("order_id").value;
    var element = document.getElementById("s"+id);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
  }
  function edit(id){
    var textInput = document.getElementById("textarea"+id);
    var button = document.getElementById("savea"+id);
    var editbutton = document.getElementById("edita"+id);

    editbutton.style.display = "none";
    button.style.display = "block"; // Hide the button
    textInput.removeAttribute("disabled"); // Enable the input

  }
  function check(){
    var confirmation = confirm("هل انت متاكد من هذه العملية؟");
    if(confirmation)
    return true

    return false
}
</script>
  @endsection