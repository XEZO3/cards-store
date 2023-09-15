@extends('public._layout')
@section('content')
<style>
   
</style>
<div class="testing" style="
    width: 90%;
   margin:auto;
    position: relative;
    height: fit-content;
    border: 1px solid rgba(0,0,0,.125);
    text-align: right;
    border-radius: 5px;
    font-family:tahoma;
">
<div style="
    border: 1px solid rgba(0,0,0,.125);
    height: 35px;
    background-color: #edeaea;
    padding: 0px 7px;
">الحد الادنى هو 25</div>
    <div><div style="
    direction: rtl;
    padding: 0px 15px;
">
        <br>
        @if($method)
            <form method="post" action="/balance/checkout/{{$method['id']}}">
                @csrf
                <label>اسم صاحب الحساب</label><br>
                <input name="name" placeholder="اسم صاحب الحساب" type="tel" style=" width: 100%;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding: 3px 10px;">
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <br><br><label>المبلغ (USD)</label><br>

                <br>
                <input type="number" min="25" name="balance" style="width: 100%;border: 1px solid rgba(0,0,0,.125);border-radius: 5px; padding: 3px 10px;">
                @error('balance')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <br><br>
                <label>ملاحظات</label>
                <textarea id="" name="note" style="overvlow:auto;width:100%;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;padding:5px 15px;min-height:100px" placeholder="أدخل الملاحظات"></textarea>
                <br>
                @error('note')
                <small class="text-danger">{{$message}}</small>
                @enderror
                <br>
                <button class="btn btn-primary" type="submit" >متابعة</button>
            </form>
        @else
            <span>payment method not found</span>

        @endif
</div>
</div>
</div>
@endsection