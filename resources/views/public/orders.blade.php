@extends('public._layout')
@section('content')
<div style="
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
    border: none;cursor:pointer" value="ابحث"></form></div>
<br>
<table class="agent" style="
    margin: 0px !important;
    width: 100%;
    text-align: center;
    direction: rtl;
">
<tbody><tr>
    <td class="namea">المنتج</td>
    <td class="phonea">رقم الطلب</td>
    <td class="cata">اللاعب/المشترك</td>
    <td class="regiona">السعر</td>
    <td class="quentity">الكمية</td>
    <td class="regiona">التاريخ</td>
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
    <td class="allb">{{$item['name']}}</td>
    <td class="allb">{{$item['id']}}</td><!---->
    <td class="allb">{{$item['game_id']}}</td>
    <td class="allb">{{$item['card']['price']}}</td>
    <td class="allb">{{$item['quentity']}}</td>
    <td class="allb">{{$item['created_at']}}</td>
        </tr>
    <tr><td><br></td></tr>
   @endforeach
</tbody></table>

  @endsection