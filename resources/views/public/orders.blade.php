@extends('public._layout')
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
                      <th>سعر القطعة</th>
                      <th>مجموع</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order['order_item'] as $item)
                    <tr>
                      <td>{{ $item['card']['name'] }}</td>
                      <td>{{ $item['quentity'] }}</td>
                      <td>${{ $item['current_item_price']}}</td>
                      <td>${{ $item['current_item_price']*$item['quentity']}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  @endsection