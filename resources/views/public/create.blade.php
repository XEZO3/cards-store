@extends('public._layout')
@section('content')
<style>
  .headertop{
      visibility: hidden;
  }
  html,
body {
height: 100%;
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
<link rel="stylesheet" type="text/css" href="{{URL::asset("css/boosttrap.min.css")}}">  

<main class="form-signin w-100 m-auto">
<form action="/user/register" method="post">
  @csrf
    <div  style="direction:rtl">
    <a href="index.php">
        <img class="mb-4" src="{{ asset('storage/'. $info['logo']) }}" alt="logo" width="72" height="57" style="display: block;"></a></div><!--this is logo so modify it-->
  <h1 class="h3 mb-3 fw-normal" style="text-align:right">التسجيل</h1>
    <div class="form-floating">
    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="XXXXXXXXXX" required>
    <label for="floatingInput">اسم المستخدم</label>
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="form-floating">
    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
    <label for="floatingInput">البريد الالكتروني</label>
    @error('email')
      <small class="text-danger">{{$message}}</small>
      @enderror
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">كلمة السر</label>
    @error('password')
         <small class="text-danger">{{$message}}</small>
        @enderror
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="password_confirmation" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">اعد كلمة السر</label>
    @error('password_confirmation')
         <small class="text-danger">{{$message}}</small>
        @enderror
  </div>

  <div class="nav">

<label for="touchp" style="width: 100%;color: #fff;background-color: #0d6efd;border: 1px solid #0d6efd;text-align: center;cursor: pointer;padding: 0.375rem 0.75rem;border-radius: 0.375rem;">متابعة
</label>               
<input type="checkbox" id="touchp"> 

<ul class="slide" style="padding-left:0px !important">
    <div class="form-floating" style="margin-bottom:10px">
    <input type="number" name="phone_number" class="form-control" id="floatingPassword" placeholder="XXXXXXXXXX" required>
    <label for="floatingInput">رقمكم على واتساب</label>
  </div>
    <button class="btn btn-primary w-100 py-2" type="submit">التسجيل</button>
  <div class="c"></div>
</ul>

</div>
     <p style="text-align:right">هل لديك حساب <a href="/user/login" style="text-decoration:none;cursor:poiner;">تسجيل الدخول</a></p>
</form>
</main>
<style>
.nav {
width : 100%; 
margin-right: 0px;
  margin-bottom: 0px;
  position: relative; 
  
}

.span {
padding: 13px 1px;
  background: url(../images/menubar.png);
  background-repeat: round;
  background-size: cover;
  color: white;
  font-size: 1.2em;
  font-variant: small-caps;
  cursor: pointer;
  display: block;
  width: 100%;
}

.span::after {
float: right;
right: 10%;
content: "+";
}

.slide {
clear:both;
width:100%;
height:0px;
overflow:auto;
text-align: right;
transition: height .4s ease;
}

.slide li {padding : 10px;}

#touchp {position: relative; opacity: 0; height: 0px;}    

#touchp:checked + .slide {height: 100%;overflow:visible} 

#touch {position: absolute; opacity: 0; height: 0px;}    

#touch:checked + .slide {height: 100%;overflow:visible} 
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}
input[type=number] {
-moz-appearance: textfield;
}
</style>


@endsection