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
  <form method="post" action="/user/login">
    @csrf
      <a href="/">
    <img class="mb-4" src="{{ URL::asset('images/logo.png') }}"  alt="logo" width="72" height="57" style="display: block;">
  </a><!--this is logo so modify it-->
    <h1 class="h3 mb-3 fw-normal" style="text-align:right">تسجيل الدخول</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" aria-describedby="emailHelp">
      <label for="floatingInput">البريد الالكتروني</label>
      @error('email')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" id="exampleInputPassword1">
      <label for="floatingPassword">كلمة السر</label>
    </div>

    
   
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p>ليس لديك حساب؟ <a href="/user/register" style="text-decoration:none;cursor:poiner;">سجل الآن</a></p>
  </form>
</main>



{{-- <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="post" action="/user/login">
                @csrf
                
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  
                </div>
                @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            
        </div>
    </div>
</div> --}}
@endsection