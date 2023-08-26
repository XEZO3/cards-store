@extends('admin._layout')
@section('content')


<div class="container mt-4">
    <!-- Order cart -->
    <div class="card">
      <div class="card-header">
        الطلبات
      </div>
      <div class="card-body">
        <ul class="list-group">
          @foreach ($orders as $index=>$order)
            <li class="list-group-item">
              <div class="d-flex justify-content-between">
                <span style="background-color:lightgrey;color:black" > Order #{{ $index }} - Customer: {{ $order['User']['name'] }}</span>
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
                      <th>#</th>

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
                        <a style="color:white" class="btn btn-success">تمت العملية</a>
                        <a style="color:white" class="btn btn-danger">الرفض</a>
                        @elseif($order['state']=="pending") 
                          <form method="post" action="/admin/keys/addkeytouser/{{$order['id']}}">
                            <textarea id="textarea{{$order['id']}}" name="keys" class="form-control" cols="30" rows="10" disabled></textarea>
                            <button id="edita{{$order['id']}}" onclick="edit({{$order['id']}})" type="button" class="btn btn-primary">تعديل</button>
                            <button  type="submit" class="btn btn-primary" id="save{{$order['id']}}" style="display: none">حفظ</button>
                          </form>  
                        @endif
                      </td>
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
  function edit(id){
    var textInput = document.getElementById("textarea"+id);
    var button = document.getElementById("save"+id);
    var editbutton = document.getElementById("edita"+id);

    editbutton.style.display = "none";
    editbutton.style.display = "block"; // Hide the button
    textInput.removeAttribute("disabled"); // Enable the input

  }
</script>
  @endsection