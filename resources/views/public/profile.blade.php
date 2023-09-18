@extends('public._layout')
@section('content')
<div class="container mt-5" dir="rtl" style="text-align: right">
    <div class="card">
        <div class="card-header bg-light">
            تعديل الملف الشخصي
        </div>
        <div class="card-body">
            <form method="POST" action="/user/profile">
                @csrf
                <div class="form-group">
                    <label for="name">الإسم</label>
                    <input type="text" disabled class="form-control" id="name" name="name" placeholder="الإسم" value="{{$user['name']}}">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="mobile">جوال</label>
                    <input type="tel" class="form-control" id="mobile" name="phone_number" placeholder="جوال" value="{{$user['phone_number']}}">
                    @error('phone_number')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group bg-success text-white p-2">
                    اذا كنت لا تريد تغيير كلمة السر فاتركها فارغة
                </div>
                <div class="form-group">
                    <label for="current-password">كلمة السر الحالية</label>
                    <input type="password" name="current-password" class="form-control" id="current-password" placeholder="كلمة السر الحالية">
                    @error('current-password')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="new-password">كلمة السر الجديدة</label>
                    <input type="password" name="password" class="form-control" id="new-password" placeholder="كلمة السر الجديدة">
                    @error('password')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">اعد كلمة السر الجديدة</label>
                    <input type="password"  name="password_confirmation" class="form-control" id="confirm-password" placeholder="اعد كلمة السر الجديدة">
                    @error('password_confirmation')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <button type="submit" class="btn btn-primary">تعديل</button>
            </form>
        </div>
    </div>
</div>

@endsection