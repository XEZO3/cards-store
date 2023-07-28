


@extends('public._layout')
@section('content')


<style>body{background-color: #e0e0e0}</style>
<table class="agent">
<tr>
    <td class="namea">الإسم</td>
    <td class="phonea">جوال</td>
    <td class="cata">الفئة</td>
    <td class="regiona">المنطقة</td>
    </tr>
    @foreach($agents as $item)
    <tr><td><br></td></tr>

    <tr style="background: #fff;
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    box-shadow: 0 1px 3px 0px #0000000f;
    width: 100% !important;
    height: 70px;">
    <td class="allb">{{$item['name']}}</td>
    <td class="allb"><a href="https://wa.me/{{$item['phone_number']}}"><i class="fa-brands fa-whatsapp fa-2xl" style="color: #34dd31;"></i></a></td><!---->
    <td class="allb">{{$item['type']}}</td>
    <td class="allb">{{$item['country']}}</td>
        </tr>
    <tr><td><br></td></tr>
   @endforeach
   
</table>

@endsection