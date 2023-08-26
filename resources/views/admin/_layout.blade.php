<!DOCTYPE html>
<html>
<head>
    
    <title>control panel</title>  
    <link rel="stylesheet" type="text/css" href="https://azouaoui-med.github.io/pro-sidebar-template/main.css">
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
    direction: rtl !important;
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8ee2d4d390.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <script src="inc/ckeditor5-build-classic/ckeditor.js"></script>
</head>
<body style="overflow-x:hidden;width:100%">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="background-color:#27282a !important;height: 100px;width: 100%;/* position: absolute; *//* z-index:10; */">   
        <div class="layout has-sidebar" style="height: 100%;">
        <aside id="" class="sidebar break-point-lg" style="z-index: 11;">
        <a id="btn-collapse"></a>
        <div class="sidebar-layout" style="background-color:#27282a;overflow-y: hidden;">
          <div class="sidebar-header">
            <div class="pro-sidebar-logo">
              <h5>اسم المستخدم</h5>
            </div>
            </div>
          </div></aside></div>
        <div class="collapse navbar-collapse" id="navbarsExample03" style="direction:rtl">
        <ul class="navbar-nav mr-auto" style="margin-right:50px !important">
          <li class="nav-item active">
              <i class="fa fa-house" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" style="float:right" href="/">عرض الصفحة الرئيسية</a>
          </li>
            
            
        </ul>
      </div>
     <div class="collapse navbar-collapse" id="navbarsExample03" style="direction: ltr;">
        <ul class="navbar-nav mr-auto" style="margin-right:50px !important">
          <li class="nav-item active" style="
    cursor: pointer;
">
              <i class="fa fa-right-from-bracket" style="float: right;padding: 12px 0px;color:#42526e" aria-hidden="true"></i>
            <a class="nav-link" href="/admin/logout" style="float:right">تسجيل الخروج</a>
          </li>
            
            
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
              <ul style="text-align:right;">
                <li class="menu-item">
                  <a href="/admin">
                    <span class="menu-icon">
                      <i class="fa-solid fa-receipt"></i>                    </span>
                    <span class="menu-title">طلبات البطاقات</span>
                  </a>
                </li>
                  
                <li class="menu-item">
                  <a href="/admin/category">
                    <span class="menu-icon">
                      <i class="fa fa-layer-group" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">التصنيفات</span>
                  </a>
                </li>
                  <li class="menu-item">
                  <a href="/admin/cards">
                    <span class="menu-icon">
                      <i class="fa fa-boxes-stacked" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">المنتجات</span>
                  </a>
                </li>
                  
                  
                  
                   <li class="menu-item">
                  <a href="/admin/info">
                    <span class="menu-icon">
                      <i class="fa fa-gear" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">اعدادات الموقع</span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="/admin/balance">
                    <span class="menu-icon">
                      <i class="fa-solid fa-money-check-dollar"></i>
                    </span>
                    <span class="menu-title">طلبات الشحن</span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="/admin/zipcode">
                    <span class="menu-icon">
                      <i class="fa-solid fa-money-check-dollar"></i>
                    </span>
                    <span class="menu-title">انشاء كود شحن</span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="/admin/agents">
                    <span class="menu-icon">
                      <i class="fa-solid fa-user-tie"></i>
                    </span>
                    <span class="menu-title">الوكلاء</span>
                  </a>
                </li>
                  <li class="menu-item">
                  <a href="/admin/office">
                    <span class="menu-icon">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                      </span>
                    <span class="menu-title">مكاتب التحويل</span>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="/admin/payment">
                    <span class="menu-icon">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                      </span>
                    <span class="menu-title">طرق الدفع</span>
                  </a>
                </li>
                  
                  <li class="menu-item">
                  <a href="/admin/banners">
                    <span class="menu-icon">
                      <i class="fa fa-scroll" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">الغلاف</span>
                  </a>
                </li>
                  
                  <li class="menu-item">
                  <a href="/admin/terms">
                    <span class="menu-icon">
                      <i class="fa-solid fa-address-card"></i>
                    </span>
                    <span class="menu-title">سياسة الخصوصية</span>
                  </a>
                </li>
                  <li class="menu-item">
                  <a href="/admin/service">
                    <span class="menu-icon">
                      <i class="fa-solid fa-handshake"></i>
                    </span>
                    <span class="menu-title">اتفاقية الاستخدام</span>
                  </a>
                </li>
                
                
                  <li class="menu-item">
                  <a href="/admin/users/show">
                    <span class="menu-icon">
                      <i class="fa-solid fa-user-plus"></i>
                    </span>
                    <span class="menu-title">المسؤولين</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/admin/changepass">
                    <span class="menu-icon">
                      <i class="fa-solid fa-user-pen"></i>
                    </span>
                    <span class="menu-title">تغيير كلمة السر</span>
                  </a>
                </li><!---->
              </ul>
            </nav>
          </div>
          
        </div>
      </aside>
      <div id="overlay" class="overlay"></div>
      <div class="layout" style="overflow-y:auto;overflow-x:hidden">
        <main class="content">
          <div>
            <a id="btn-toggle" style="color:white;margin-top:17px;" href="#" class="sidebar-toggler break-point-lg">
              <i class="ri-menu-line ri-xl"></i>
              </a>
              <br>
    <div class="c"></div>

    <div class="all" style="direction:rtl;text-align:right;">
      @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif
@yield('content')

</div></main></div></div> 
</div>
</script>
<script src="https://azouaoui-med.github.io/pro-sidebar-template/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
