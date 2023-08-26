@extends('public._layout')
@section('content')

<table class="agent" style="
    margin: 0px !important;
    width: 100%;
    text-align: center;
    direction: rtl;
">
<tbody><tr>
    <td class="namea">رقم العملية</td>
    <td class="phonea">المبلغ</td>
    <td class="cata">تاريخ الارسال</td>
    <td class="regiona">الحساب</td>
    <td class="regiona">ملاحظات</td>
    <td class="regiona">الحالة</td>

    </tr>
    @foreach ($balance as $item)
    <tr><td><br></td></tr>
    <tr style="
    background: #e0e0e07a;
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    box-shadow: 0 1px 3px 0px #0000000f;
    width: 100% !important;
    height: 70px;
    ">
    <td class="allb">{{$item['id']}}</td>
    <td class="allb">{{$item['price']}} $</td>
    <td class="allb">{{$item['created_at']}}</td>
    <td class="allb">{{$item['payment_methods']['name']}}</td>
    <td class="allb">{{$item['note']}}</td>
    <td class="allb">{{$item['state']=="pending" ? "قيد الانتظار" : ($item['state']=="done" ? "تمت العملية" : ($item['state']=="rejected" ? "تم الالغاء" : "دين"))}}</td>

        </tr>
    <tr><td><br></td></tr>
    @endforeach

</tbody></table>
@endsection