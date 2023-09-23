<!DOCTYPE html>
<html>
<head>
    <title>{{$info['name']}}</title>
    <link rel="stylesheet" type="text/css" href="https://azouaoui-med.github.io/pro-sidebar-template/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
     .sidebar-header{border-bottom: 1px solid #343e44}
    .sidebar-header a{margin-left:80px}
    .sidebar-header a img{width:70px !important}
    .sidebar-header a h5{display:none !important}
    .footer-box{padding:0px !important;}
.footer-box div{padding:0px !important;}
        * {
            padding: 0px;
            margin: 0px;
        }
         .t-intel{display:contents !important ;
              }
              @media(min-width:992px){.side-logo{display:none !important}}
    .t-logo{
        margin-right:30px;
    }
    .t-logo img {width:74px;}
    
    @media (min-width:993px){
        .t-logo {display:none !important;}
        
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
.content{padding:6px 6px !important;}
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
.sidebar, .menu, .menu-item a, .menu-icon i { color:#ffffff !important;}
/*headertop style start*/

.animate-fading{animation:fading 5s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
        
        .mySlides{
            width: 100%;
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="background-color:#27282a !important;height: 100px;width: 100%;/* position: absolute; *//* z-index:10; */">   
       
    <div class="layout has-sidebar  t-intel" style="height: 100%;">
      <aside id="" class="sidebar break-point-lg" style="
    z-index: 11;
">
        <a id="btn-collapse"></a>
        <div class="sidebar-layout" style="background-color:#27282a;">
          <div class="sidebar-header" style="padding:0px !important;">
            <a href="/" style="color:#fff !important" class="pro-sidebar-logo">
              <img src="{{asset("storage/".$info['logo'])}}" style="width:50px">
              <h5>{{$info['name']}}</h5><!--اربطها مع الادمن-->
            </a>
            </div></div></aside></div>
            <a href="/" class="t-logo" >
              <img src="{{ asset('storage/'. $info['logo']) }}" style="width: 75px;float: right;text-align: right;">
              
            </a>
            @auth
           <ul style="margin-right:50px !important;margin-bottom: 0px;padding-left:0 !important">
              <li>
                   <div style="color: rgb(21, 87, 36);border: 1px solid #c3e6cb;background-color: #d4edda;min-width:130px;max-height: 38px;height: 100%;border-radius: 4px;text-align: right;padding-right: 10px !important;padding: 3px;">
                    <strong>&lrm;${{auth()->user()->balance}}</strong>
                   </div>
              </li>
        </ul>
         @endauth
        <div class="collapse navbar-collapse" id="navbarsExample03" style="direction:rtl">
        <ul class="navbar-nav mr-auto" style="margin-right:50px !important">
          @auth
        <li class="nav-item active">
          @if(auth()->user()->rank==1)
          <i class="fa-solid fa-crown" style="color: #ffd700;"></i>
          @elseif(auth()->user()->rank==2)
          <i class="fa-solid fa-crown" style="color: #c0c0c0;"></i>
          @elseif(auth()->user()->rank==3)
          <i class="fa-solid fa-crown" style="color: #cd7f32;"></i>
          @endif
          <a class="nav-link" style="float:right">{{auth()->user()->name}}</a>
      </li>
          @else
          <li class="nav-item active">
              <i class="fa fa-right-to-bracket" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" style="float:right" href="/user/login">الدخول</a>
          </li>
            <li class="nav-item active">
              <i  class="fa fa-user-plus" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" style="float:right" href="https://wa.me/{{$info['phone_number']}}?text=اريد انشاء حساب جديد">التسجيل</a>
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
              <div class="sidebar-header side-logo" style="padding:0px !important;height: 50px !important;margin-left: 10px;">
            <a href="/" style="color:#fff !important" class="pro-sidebar-logo">
              <img  src="{{ asset('storage/'. $info['logo']) }}" style="width:50px;margin-right: 10px;">
              <h5>{{$info['name']}}</h5><!--اربطها مع الادمن-->
            </a>
            </div>
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
                    <a href="/payment/recharge">
                      <span class="menu-icon">
                        <i class="fa-solid fa-money-bill-1"></i>
                      </span>
                      <span class="menu-title">شحن رصيد</span>
                    </a>
                  </li>
                    <li class="menu-item">
                    <a href="/orders">
                      <span class="menu-icon">
                          <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                      <span class="menu-title">عرض طلبياتي</span>
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
                  <a href="https://wa.me/{{$info['phone_number']}}?text=اريد انشاء حساب جديد">
                    <span class="menu-icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>                    </span>
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
                <li class="menu-item">
                  <a href="/user/profile">
                    <span class="menu-icon">
                      <i class="fa-solid fa-user"></i>
                    </span>
                    <span class="menu-title">تعديل الملف الشخصي</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/user/logout">
                    <span class="menu-icon">
                      <i class="fa fa-right-to-bracket" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">تسجيل خروج </span>
                  </a>
                </li>
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
                    <a href="https://telegram.me/{{$info['email']}}" style="margin: 5px;font-size: 20px;"><i class="fa-brands fa-telegram" aria-hidden="true"></i></a>
                     <a href="https://wa.me/{{$info['phone_number']}}" style="margin: 5px;font-size: 20px;"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
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


            
              <!--content*********************-->
              <br>
          <div dir="ltr">
            @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
          </div> 
          @if(count($news)>0)
          <div id="news-popup" class="popup">
          <div class="popup-content">
              <span id="close-popup" class="close">&times;</span>
              <h2 style="text-align:right">اخر الاخبار</h2>
              <ul style="text-align:right;list-style:none">
                  @foreach ($news as  $index => $item)
                      <li>                     
                          <p>{{ $item->news }}</p>
                      </li>
                  @endforeach
              </ul>
          </div>
      </div>
      @endif
      <style>
          .popup {
              display: block;
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.7);
              z-index: 1;
          }

          .popup-content {
              background-color: #fff;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              padding: 20px;
              border-radius: 5px;
              box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
              font-size: 16px; /* Adjust the font size as needed */
              width: 80%; /* Adjust the width as needed */
              max-width: 600px; /* Optional: Set a maximum width */
              height: 80%; /* Adjust the height as needed */
              max-height: 600px; /* Optional: Set a maximum height */
          }

          .close {
              position: absolute;
              top: 10px;
              right: 15px;
              font-size: 20px;
              font-weight: bold;
              cursor: pointer;
          }
      </style>
          
             
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
<p class="text-center text-muted">    جميع الحقوق محفوظة لدى {{$info['name']}} © 2023</p><!--modify it and connect it with admin dashboard-->
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
<script>
   document.getElementById('close-popup').addEventListener('click', function() {
        document.getElementById('news-popup').style.display = 'none';
    });
</script>
</body>
</html>