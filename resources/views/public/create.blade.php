@extends('public._layout')
@section('content')
<style>.headertop{visibility: hidden;overflow: hidden}</style> 
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<style>
    .headertop{
        visibility: hidden;
    }
    html,
body {
  height: 100%;
    direction: rtl !important;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
   

<main class="form-signin w-100 m-auto">
    <form method="post" action="/user/register">
        @csrf
      <a href="/">
    <img class="mb-4" src="{{ URL::asset('images/logo.png') }}" alt="logo" width="72" height="57" style="display: block;"></a><!--this is logo so modify it-->
    <h1 class="h3 mb-3 fw-normal" style="text-align:right">تسجيل الدخول</h1>
      <div class="form-floating">
      <input type="text" name="name" id="floatingInput" placeholder="XXXXXXXXXX" class="form-control"/>
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
      <label for="floatingInput">اسم المستخدم</label>
    </div>


    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">البريد الالكتروني</label>
      @error('email')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">كلمة السر</label>
      @error('password')
         <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    
    <div class="form-floating">
        <input type="password" name="password_confirmation" class="form-control"id="floatingPassword" placeholder="repeate password">
        <label for="floatingPassword">اعد كلمة السر</label>
        @error('confpassword')
        <small class="text-danger">{{$message}}</small>
        @enderror
      </div>

    <button class="btn btn-primary w-100 py-2" type="submit">تسجيل</button>
       <p>هل لديك حساب <a href="/user/login" style="text-decoration:none;cursor:poiner;">تسجيل الدخول</a></p>
  </form>
</main>


@endsection