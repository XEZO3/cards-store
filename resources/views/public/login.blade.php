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
 <link rel="stylesheet" type="text/css" href="css/boosttrap.min.css">  


<main class="form-signin w-100 m-auto">
<form action="" method="post">
    <div style="direction:rtl">
    <a href="index.php">
        <img class="mb-4" src="images/logo.png" alt="logo" width="72" height="57" style="display: block;"></a></div><!--this is logo so modify it-->
  <h1 class="h3 mb-3 fw-normal" style="text-align:right">تسجيل الدخول</h1>

  <div class="form-floating">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">البريد الالكتروني</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">كلمة السر</label>
  </div>
  <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  <p style="text-align:right">ليس لديك حساب؟ <a href="signup.php" style="text-decoration:none;cursor:poiner;">سجل الآن</a></p>
</form>
</main>
@endsection