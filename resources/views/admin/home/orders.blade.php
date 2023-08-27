@extends('admin._layout')
@section('content')


<div class="container mt-4">
    <!-- Order cart -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-5">
          <input type="text" class="form-control" id="order_id" placeholder="رقم الطلب">
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
        <ul class="list-group">
          @foreach ($orders as $order)
            <li id="s{{$order['order_id']}}" class="list-group-item">
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
                      <th>رقم اللاعب</th>
                      <th>مجموع</th>
                      <th>الحالة</th>
                      <th>البطاقات</th>
                      @if($order['card']['require_id']==false && $order['state']=="pending")
                      <th>#</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>{{ $order['card']['name'] }}</td>
                      <td>{{ $order['quentity'] }}</td>
                      <td>{{$order['game_id']}}</td>
                      <td>{{ $order['total']}}</td>
                      <td>{{ $order['state'] === 'pending' ? 'قيد الانتظار' : ($order['state'] === 'rejected' ? 'تم الرفض' : ($order['state'] === 'done' ? 'تمت العملية' : 'حالة غير معروفة')) }}</td>
                      <td>
                        @if($order['card']['require_id']==true && $order['state']=="pending")
                        <a href="/admin/order/state/{{$order['id']}}/done" style="color:white" class="btn btn-success">تمت العملية</a>
                        <a href="/admin/order/setstate/{{$order['id']}}/rejected" style="color:white" class="btn btn-danger">الرفض</a>
                        @elseif($order['state']=="pending") 
                          <form method="post" action="/admin/keys/addkeytouser/{{$order['id']}}">
                            @csrf
                            <textarea id="textarea{{$order['id']}}" name="keys" class="form-control" cols="30" rows="10" disabled></textarea>
                            <button id="edita{{$order['id']}}" onclick="edit({{$order['id']}})" type="button" class="btn btn-primary">تعديل</button>
                            <button  type="submit" class="btn btn-primary" id="savea{{$order['id']}}" style="display: none">حفظ</button>
                          </form>  
                        @endif
                      </td>
                      @if($order['card']['require_id']==false && $order['state']=="pending")
                      <td><a href="/admin/order/setstate/{{$order['id']}}/rejected" style="color:white" class="btn btn-danger">الرفض</a></td>
                      @endif
                     
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
</script>
  @endsection