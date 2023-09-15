@extends('public._layout')
@section('content')

<div class="container-fluid" style="margin:auto;">
    <div class="card" style="border: 1px solid rgba(0,0,0,.125); border-radius: 5px; font-family:tahoma;text-align:right">
        <div class="card-header" style="background-color: #edeaea; padding: 0px 15px; height: 40px;">شحن رصيد</div>
        <div class="card-body" style="padding: 0px 15px;">
            <form action="/payment/recharge" method="post">
                @csrf
                <label for="code" style="text-align:left">الرمز</label><br>
                <input type="text" id="code" name="code" maxlength="16" onkeyup="this.value = this.value.toUpperCase();" class="form-control mb-2"><br>
                <input type="submit" value="إضافة" class="btn btn-primary btn-block" style="cursor:pointer;">
            </form>
        </div>
    </div>
</div>
@endsection
