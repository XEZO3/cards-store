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
                    <input type="text" class="form-control" id="name" name="name" placeholder="الإسم" value="{{$user['name']}}">
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="name">الايميل</label>
                    <input type="text" disabled class="form-control" id="name" name="email" placeholder="الإسم" value="{{$user['email']}}">
                    @error('email')
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
                <div class="form-group">
                    <label for="mobile">الدولة</label>
                    <input type="tel" class="form-control" id="mobile" name="country" placeholder="جوال" value="{{$user['country']}}">
                    @error('country')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="mobile">المدينة</label>
                    <input type="tel" class="form-control" id="mobile" name="town" placeholder="جوال" value="{{$user['town']}}">
                    @error('town')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <div class="form-group">
                    <label for="mobile">العنوان</label>
                    <input type="tel" class="form-control" id="mobile" name="location" placeholder="جوال" value="{{$user['location']}}">
                    @error('location')
                    <small class="text-danger">{{$message}}</small>
                   @enderror
                </div>
                <button type="submit" class="btn btn-primary">تعديل</button>
            </form>
        </div>
    </div>
</div>

@endsection