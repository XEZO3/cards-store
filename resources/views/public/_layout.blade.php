<!DOCTYPE html>
<html>
<head>
    <title>{{$info['name']}}</title>
    <link rel="stylesheet" type="text/css" href="https://azouaoui-med.github.io/pro-sidebar-template/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
        * {
            padding: 0px;
            margin: 0px;
        }
        body{
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    opacity: 1;
    max-width: 100%;
    direction: ltr !important;
}
        .layout{
            min-height: 100px !important;
        }
        a{
        text-decoration: none !important;
        }
.r{
    float: right;
}
.l{
    float: left;
}
.c{
    clear: both;
}
.w{
width: 1200px !important;
    margin-right: auto !important;
    margin-left: auto !important;
}
/*headertop style start*/

.animate-fading{animation:fading 5s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
        
        .mySlides{
            max-width: 1200px;
        }
        .sidebar .sidebar-layout::-webkit-scrollbar{
        background-color: #27282a;
        }
    .sidebar .sidebar-layout:hover::-webkit-scrollbar-thumb {
    background-color: #27282a;
}
.navbar-expand-sm .navbar-collapse {
            flex-basis: 100% !important;
        }
</style>
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8ee2d4d390.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="overflow-x: hidden;">
    
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="background-color:#27282a !important;height: 100px;width: 100%;/* position: absolute; *//* z-index:10; */">   
       
    <div class="layout has-sidebar" style="height: 100%;">
      <aside id="" class="sidebar break-point-lg" style="
    z-index: 11;
">
        <a id="btn-collapse"></a>
        <div class="sidebar-layout" style="background-color:#27282a;">
          <div class="sidebar-header" style="padding:0px !important;">
            <div class="pro-sidebar-logo">
              <img src="{{asset("storage/".$info['logo'])}}" style="width:50px">
              <h5>{{$info['name']}}</h5><!--اربطها مع الادمن-->
            </div>
            </div></div></aside></div>
       <ul style="margin-right:50px !important;margin-bottom: 0px;">
          <li>
               <div style="color: rgb(21, 87, 36);border: 1px solid #c3e6cb;background-color: #d4edda;min-width:130px;max-height: 38px;height: 100%;border-radius: 4px;text-align: right;padding-right: 10px !important;padding: 3px;">
                <strong>&lrm;$0.00</strong>
               </div>
          </li>
         
        </ul>
        <div class="collapse navbar-collapse" id="navbarsExample03" style="direction:rtl">
        <ul class="navbar-nav mr-auto" style="margin-right:50px !important">
          @auth
          <li class="nav-item active">
            <i class="fa fa-right-to-bracket" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
          <a class="nav-link" style="float:right" href="/user/logout">تسجيل الخروج</a>
        </li>

          @else
          <li class="nav-item active">
              <i class="fa fa-right-to-bracket" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" style="float:right" href="/user/login">الدخول</a>
          </li>
            <li style="padding: 8px 0px;text-align:right;color: white;margin: 0px 10px;">
                <span>أو</span>
            </li>
            <li class="nav-item active">
            <i class="fa fa-user-plus" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" style="float:right" href="/user/register">التسجيل</a>
          </li>
          @endauth
        <!--
<li class="nav-item active" style="cursor:pointer;">
            <i class="fa fa-right-from-bracket" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" style="float:right">تسجيل الخروج</a>
          </li>
-->
        </ul>
      </div>
     
    </nav>
    <div class="layout has-sidebar" style="height:100%">
      <aside id="sidebar" class="sidebar break-point-lg">
        <a id="btn-collapse"></a>
        <div class="sidebar-layout" style="background-color:#27282a">
          
          <div class="sidebar-content" style="
    /* margin-top: 80px; */
">
            <nav class="menu open-current-submenu">
              <ul>
                <li class="menu-item">
                  <a href="/">
                    <span class="menu-icon">
                      <i class="fa fa-house" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">الرئيسية</span>
                  </a>
                </li>
                  <!--If *NOT* logged in show this: -->
                  @auth
                  <li class="menu-item">
                    <a href="/paymenthistory">
                      <span class="menu-icon">
                          <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                      <span class="menu-title">دفعاتي </span>
                    </a>
                  </li>


                  <li class="menu-item">
                    <a href="/payment">
                      <span class="menu-icon">
                        <i class="fa fa-building-columns" aria-hidden="true"></i>
                      </span>
                      <span class="menu-title">إضافة رصيد</span>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="redeem.php">
                      <span class="menu-icon">
                        <i class="fa-solid fa-money-bill-1"></i>
                      </span>
                      <span class="menu-title">شحن رصيد</span>
                    </a>
                  </li>
                    <li class="menu-item">
                    <a href="viewall.php">
                      <span class="menu-icon">
                          <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                      <span class="menu-title">عرض طلبياتي</span>
                    </a>
                  </li>
                    <li class="menu-item">
                    <a href="/favorite">
                      <span class="menu-icon">
                          <i class="fa-solid fa-heart"></i> 
                        </span>
                      <span class="menu-title">المفضلة</span>
                    </a>
                  </li> 
                  @else
                  <li class="menu-item">
                  <a href="/user/login">
                    <span class="menu-icon">
                      <i class="fa fa-right-to-bracket" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">الدخول</span>
                  </a>
                </li>
                  <li class="menu-item">
                  <a href="/user/register">
                    <span class="menu-icon">
                      <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">التسجيل</span>
                  </a>
                </li>
                @endauth
                  <!---->
                  
                  <li class="menu-item">
                  <a href="/agents">
                    <span class="menu-icon">
                      <i class="fa fa-truck-fast" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">وكلاؤنا</span>
                  </a>
                </li>
                  <!--If logged in DON'T show this: -->
                  <li class="menu-item">
                  <a href="/terms">
                    <span class="menu-icon">
                      <i class="fa-solid fa-address-card"></i>
                    </span>
                    <span class="menu-title">سياسة الخصوصية</span>
                  </a>
                </li>
                  <li class="menu-item">
                  <a href="/service">
                    <span class="menu-icon">
                      <i class="fa-solid fa-handshake"></i>
                    </span>
                    <span class="menu-title">اتفاقية الاستخدام</span>
                  </a>
                </li>
                <!---->
                <!--If logged in show this: -->
                @auth
                {{-- <li class="menu-item">
                  <a href="editprofile.php">
                    <span class="menu-icon">
                      <i class="fa-solid fa-user"></i>
                    </span>
                    <span class="menu-title">تعديل الملف الشخصي</span>
                  </a>
                </li> --}}
                @endauth
                  
                <!---->
              </ul>
            </nav>
          </div>
          <div class="sidebar-footer">
            <div class="footer-box" style="background-color:#343e44">
              
              <div style="padding: 0 10px">
                <span style="direction: rtl;display: block;margin-bottom: 10px">الدعم الفني : </span>
                <div style="margin-bottom: 15px;">
                    <a href="tel:{{$info['phone_number']}}" style="margin: 5px;font-size: 20px;"><i class="fa fa-phone" aria-hidden="true"></i></a> <!--phone number-->
                    <a href="mailto:{{$info['email']}}" style="margin: 5px;font-size: 20px;"><i class="fa-solid fa-envelope"></i></a><!--email-->
                    <a href="https://wa.me/{{$info['phone_number']}}" style="margin: 5px;font-size: 20px;"><i class="fa-brands fa-whatsapp"></i></a><!--phone number-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </aside>
      <div id="overlay" class="overlay"></div>
      <div class="layout hid" style="overflow-y:auto">
        <main class="content">
          <div>
            <a id="btn-toggle" style="color:white;margin-top:17px;" href="#" class="sidebar-toggler break-point-lg">
              <i class="ri-menu-line ri-xl" style="
"></i>
            </a>
              <!--content*********************--><br>
@yield('content')
</div>
</main>
<br><br>        

<div class="container" dir="rtl">
<footer class="py-3 my-4">
<ul class="nav justify-content-center border-bottom pb-3 mb-3" style="display:flex !important;">
  <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">الرئيسية</a></li>
  <li class="nav-item"><a href="/terms" class="nav-link px-2 text-muted">سياسة الخصوصية</a></li>
  <li class="nav-item"><a href="/service" class="nav-link px-2 text-muted">شروط الخدمة</a></li>
</ul>
<p class="text-center text-muted">    جميع الحقوق محفوظة لدى # © 2023</p><!--modify it and connect it with admin dashboard-->
</footer>
</div>
<div class="overlay"></div>
</div>
</div>
<script src="https://azouaoui-med.github.io/pro-sidebar-template/main.js"></script>
<script>
var myIndex = 0;
carousel();

function carousel() {
var i;
var x = document.getElementsByClassName("mySlides");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";  
}
myIndex++;
if (myIndex > x.length) {myIndex = 1}    
x[myIndex-1].style.display = "block";  
setTimeout(carousel, 4500);    
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>