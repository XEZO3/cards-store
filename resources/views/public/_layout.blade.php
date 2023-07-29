<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <title>{{$info['name']}}</title>
    
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }
        .search{
    background: #f9fafc;
    padding: 0px;
    display: flex;
  flex-direction: row-reverse;
    list-style: none;    
}
.searchform input[type=text]{
    padding: 6px;
    font-family: tahoma;
    color: #273444;
    background-color: #eff2f7;
    width: 80%;
    border: 1px solid #e0e6ed;
    border-radius: 50px;
    margin-right: 10px;
    margin-top: 20px;
    margin-bottom: auto;
    position: relative; 
}
.searchform button[type=submit]{
    position: relative;
    background-color: transparent;
    border: 0px transparent solid;
    margin-top: auto;
    margin-right: -40px;
    padding: 10px 0px;
    cursor: pointer;
}
.searchform button i{
    -webkit-transform: scaleX(-1);
  transform: scaleX(1);
    font-size: 16px;
}
.sf button i{
    -webkit-transform: scaleX(-1);
  transform: scaleX(-1);
    font-size: 16px;
}
        body{
    direction: rtl;
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    opacity: 1;
    max-width: 100%;
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
.w1{
    width: 1000px !important;
    margin: 0px 50px !important;
    margin-right: 140px !important;
}
/*headertop style start*/
.headertop{
    background-color: #fff !important;
    box-shadow: 0px 4px 2px 4px rgba(0,0,0,0.048), 0px 2px 1px 3px rgba(0,0,0,0.05) !important;
    max-height: 115px !important;
    
}
.searchform{
    margin: 10px 50px 100px 1000px !important;
}
.alogo{
   display: inline !important;
    margin-top: 200px !important;
}
.sf{
    display: inline !important;
    margin-bottom: 100px !important;
}
/*headertop style end*/
/*menubar style start*/
.menubar{
    background-image: url(../im]ages/menubar.png) !important;
    background-repeat: repeat-x !important;
    background-position: right !important;
    padding: 0px !important;
    margin: 0px !important;
    border: 0px !important;
    background-size: 1370px !important;
}
.menubar ul{list-style: none !important;}
.menubar ul li{
    float: right !important;
    padding: 15px 3px !important;
    margin-left: 5px !important;
}
.menubar ul li a{
    text-decoration: none !important;
    font-family: tahoma !important;
    font-size: 14px !important;
    color: #ff7f27 !important;
    padding: 10px 20px !important;
    border-radius: 4px !important;
    
}
.menubar ul li a:hover{
    background: #ff7f27 !important;
    color: #fff !important;
}
/*menubar style end*/
/*search style start*/
.header-top{
    background: #f9fafc !important;
    padding: 0px !important;
    display: flex !important;
  flex-direction: row-reverse !important;
    list-style: none !important;    
}
.searchform input[type=text]{
    padding: 6px;
    font-family: tahoma !important;
    color: #273444 !important;
    background-color: #eff2f7 !important;
    width: 912px !important;
    border: 1px solid #e0e6ed;
    border-radius: 50px !important;
    margin-right: 10px !important;
    margin-top: 24px !important;
    position: absolute !important; 
}
.searchform button[type=submit]{
    margin-left: 50px !important;
    position: absolute !important;
    background-color: transparent !important;
    border: 0px transparent solid !important;
    margin-top: 32px !important;
    margin-right: 895px !important;
    padding: 10px 0x !important;
    cursor: pointer !important;
}
.searchform button i{
    -webkit-transform: scaleX(-1) !important;
  transform: scaleX(1) !important;
    font-size: 16px !important;
}
.sf button i{
    -webkit-transform: scaleX(-1) !important;
  transform: scaleX(-1) !important;
    font-size: 16px !important;
}
.list-hor{
    float: right;
    list-style-type: none;
  margin: 0;
  padding: 0px 16px;
  overflow: hidden;
  background-color: ;
    
}
.list-hor li {
  float: right;
}
.list-hor li a {
  display: block;
  color: white;
  text-align: center;
  padding: 1px 10px;
  text-decoration: none;
  color: #42526e;
 
}

.navbar {
}
.navbar a {
  float: right;
  font-size: 16px;
  text-align: center;
  padding: 9px 10px;
  text-decoration: none;
}

.tra{
    border-right: 1px #e5e9f2 solid;
    
}
.cart{
  cursor: pointer;
  display: inline;  
}
#cart button i{
    font-size: 22px;
    height: auto;
    
    
}
#cart{
    float:left;
    margin: 5px;
    color: #42526e;
    display: inline;    
    background-color: #ffffff;
    border: 1px solid #c2c7d0;
    border-radius: 500px;
    width: 37px;
    height: 37px;
    font-size: 16px;
    max-height: 40px;
    max-width: 40px;
    padding: 5px;
    box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.05);
        margin-top: -45px;
box-sizing: border-box;
    margin-right: 50px;}
#cart:hover{
    box-shadow: 0px 1.5px 2px 0px rgba(0,0,0,0.5);
}
#cart button{
    background-color: transparent;
    border: 0px;
    cursor: pointer;
}
#trans{
    color: transparent;
    background-color: transparent;
    visibility: hidden;
}
.animate-fading{animation:fading 5s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}

#pro_img{
    width: 200px;
    height: 400px;
        max-height: 400px;
    box-sizing: border-box;
}
#pro_img img{
    border-radius: 5px;
    width: 100%;
    height: 60%;
}
#pro_img img:hover{
    opacity: 0.9;
}
#pro_title a{
    text-decoration: none;
    font-family: tahoma;
    font-size: 20px;
    font-weight: bold;
    float: right;
    color: #000;
    margin: 5px;
}
#pro_price a{
    text-decoration: none;
    font-family: tahoma;
    font-size: 20px;
    font-weight: bold;
    float: right;
    color: #FF0000;
}
#pro_per a{
    text-decoration: none;
    background-color: #13ce66;
    color: #fff;
    border-radius: 9px;
    margin-right: 9px;
    font-family: tahoma;
    font-size: 14px;
    font-weight: bold;
    float:right;
    margin-top: 4px;
    padding: 2px 4px;
}
#pro_t{
    text-decoration: none;
    font-family: tahoma;
    font-size: 14px;
    color: dimgray;
    margin-top: 1px;
    display: inline;
}
#pro_pricel{
    margin-top: 15px;
}
#pro_save{
    width: 99%;
    height: 5.5%;
    background-color: #e4faef;
    border-right: 4px #13ce66 solid;
    border-radius: 4px;
    margin-bottom: 4px;
}
#hid input{
background-color: transparent;
}
#pro_save i{
    text-align: center;
    margin-right: 2px;
    margin-top: 4px;
    color: #13ce66;

}
#pro_save a{
    text-decoration: none;
    color: #273444;
}
#pro_pricel a{
    text-decoration: line-through;
    text-decoration-color: #FF0000;
    text-decoration-style: solid;
    text-decoration-thickness: 2px;
    font-family: tahoma;
    font-size: 16px;
   margin-right: 10px;
    color:dimgrey;
}
#pro_kw a{
   text-decoration: none;
    font-family: tahoma;
    font-size: 16px;
    float: right; 
    border-radius: 3px;
    color: #3c4858;
    padding: 2px 4px;
    margin: 0px 2px;
}
#buyl{
border-top: 1px solid #000;
}
#buyr{
    margin-right: -4.5%;
}
#pro_buy{
    float:right;
    margin: 5px;
    color: #42526e;
    display: inline;    
    background-color: #ffffff;
    border: 1px solid #c2c7d0;
    border-radius: 500px;
    width: 30px;
    height: 30px;
    font-size: 16px;
    max-height: 30px;
    max-width: 30px;
    padding: 5px;
    box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.05);
    margin-right: 50px;
}
#pro_buy:hover{
    box-shadow: 0px 1.5px 2px 0px rgba(0,0,0,0.5);
}
#pro_buy button{
    background-color: transparent;
    border: 0px;
    cursor: pointer;
}
.panel{
    background-color: #fff;
    border: 1px solid #eed;
    display: ;
    
}
.panel_title{
    background-color: #f5f5f5;
    border-bottom: 1px solid #eee;
    padding: 8px;
    font-size: 14px;
    font-family: tahoma;
    color: #555;
    font-weight: bold;
    
}
.panel_body{
padding: 8px;
    font-size: 14px;
    font-family: tahoma;
color: #555;
}
.button_add_cart{
    width: 100%;
	padding: 8px;
	color: #ffffff;
	background: none #d22d2d;
	border: none;
	border-radius: 6px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
    }
#p_info{
    padding: 5px;
    border-bottom: 1px solid #eee;
}
.pro_img{
    margin: 0px 10px;
}
.add_cart{
    width: 88%;
	padding: 8px;
	color: #ffffff;
	background: none #d22d2d;
	border: none;
	border-radius: 6px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
    
}
.imagea{
    width: 10%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.titlea{
    width: 40%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.modela{
    width:10%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.qtya{
    width: 16%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.pricea{
    width: 10%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.tota{
    width: 10%;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.qty_re{
    margin: 0px; 
    padding: 7px;
    outline: 1px solid;
}
.big-box ul{
    list-style: none;
}
.big-box ul li{
    border: 1px solid black;
    height: 85px;
    width: 10%;
    border-radius: 10px;
    box-shadow: 0 1px 3px 0px rgb(0 0 0 / 20%), 0 2px 1px -1px rgb(0 0 0 / 12%), 0 1px 1px 0 rgb(0 0 0 / 14%);
}
.big-box ul li:hover{ 
    box-shadow: 1px 2px 10px 0px rgba(0,0,0,0.5);
}
.namea{
    width: 30%;
    border-left: 2px solid #cccccc;
    border-right: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.cata{
    width:20%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.phonea{
    width:20%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.regiona{
    width:20%;
    border-left: 2px solid #cccccc;
    padding: 5px 0px;
    font-weight: bold;
    padding-right: 5px;
    text-align: center;
}
.agent{
    
    width: 100%
}
.allb{
    width:20%;
    padding: 5px 0px;
    padding-right: 5px;
    text-align: center;
}

    </style>
    <link rel="stylesheet" href="{{URL::asset('css/boosttrap.css')}}">
    {{-- <link rel="stylesheet" href="{{URL::asset('css/main.d60ce69b242ee9fe8408d682abe66a8d.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{URL::asset('css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{URL::asset('css/pro.css')}}">  

    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8ee2d4d390.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .nav-link{
            color: #42526e !important;
        }
        /* Responsive Styles */
        .header-top {
            width: 100%;
            max-width: 1450px;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
        }
        .header-top ul.list-hor {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .header-top ul.list-hor li {
            margin: 5px;
        }
        .header-top ul.list-hor li a div {
            display: flex;
            align-items: center;
        }
        .header-top ul.list-hor li a div i {
            margin-right: 5px;
        }
        .searchform {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        .searchform input[type="text"] {
            flex: 1;
        }
        .searchform button {
            flex: 0 0 40px;
        }
        .content {
            width: 100% !important;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .mySlides{
            max-width: 100%;
        }
    </style>
</head>
<body style="overflow-x: hidden;">
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="direction:rtl;background-color:#f9fafc !important">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation"style="
    color: rgba(255,255,255,.5)!important;
    background-color: transparent !important;
">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto" style="margin-right:50px !important">
            @if(!auth()->check())
          <li class="nav-item active">
              <i class="fa fa-user" style="float: right;padding: 12px 0px;color:#42526e"></i>
            <a class="nav-link" href="/user/login">ادخل لحسابك <span class="sr-only">(current)</span></a>
          </li>
            <li style="padding: 8px 0px;text-align:right">
                <span>أو</span>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="/user/register">سجل الآن <span class="sr-only">(current)</span></a>
          </li>
          @else
          <li class="nav-item active">
            <i class="fa fa-user" style="float: right;padding: 12px 0px;color:#42526e"></i>
            <a class="nav-link" href="/user/logout">تسجيل خروج<span class="sr-only">(current)</span></a>
          </li>
          @endif
            <li class="nav-item active">
            
            <a class="nav-link" href="/favorite"><i class="fa fa-heart" style="float: right;padding: 5px 4px;"></i> المفضلة <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
                
            <a class="nav-link" href="/agents"><i class="fa fa-truck-fast" style="float: right;padding: 5px 4px;"></i> وكلاؤنا <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-circle-info"style="float: right;padding: 5px 4px;"></i>   المساعدة</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="tel:{{$info['phone_number']}}">{{$info['phone_number']}}</a>
              <a class="dropdown-item" href="mailto:{{$info['email']}}">راسلنا عبر البريد</a>
              <a class="dropdown-item" href="prip.php">سياسة الخصوصية</a>
              <a class="dropdown-item" href="terms.php">شروط الخدمة</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    
    
    <div class="headertop" style="display: grid;">
        
        <nav class="navbar navbar-expand navbar-dark bg-dark" style="background-color: #fff !important;max-height: 115px !important;padding: 0px 0px !important;">
      <a class="navbar-brand" href="/"><img src="{{ asset('storage/'. $info['logo']) }}" width="100%" style="max-width:100px"></a><!-- connect the logo with admin dashboard-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample02">
        <form class="form-inline my-2 my-md-0" style="width:100%;max-width:1000px" method="GET" action="/search">
          <input class="form-control" type="text" name="name" placeholder="إبحث هنا ..." style="
    font-family: tahoma !important;
    color: #273444 !important;
    background-color: #eff2f7 !important;
    width: 100% !important;
    border: 1px solid #e0e6ed;
    border-radius: 50px !important;
">
        </form>
      </div>
    </nav>
        <form action="/cart" style="z-index: 10;
    margin-top: -25px;">
            <a href="/cart">
                <div class="cart">
                    <div id="cart">
                        <button>
                            <i class="fa fa-cart-shopping-fast" style="font-size:22px !important;"></i>
                        </button>
                    </div>
                </div>
            </a>
        </form>
    </div>  

    <!-- Rest of the content goes here -->
    <br>
    <br>
    <div class="w content" id="maca">
@yield('content')
</div>
<br>
<br>
<div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">الرئيسية</a></li>
          <li class="nav-item"><a href="prip.php" class="nav-link px-2 text-muted">سياسة الخصوصية</a></li>
          <li class="nav-item"><a href="terms.php" class="nav-link px-2 text-muted">شروط الخدمة</a></li>
        </ul>
        <p class="text-center text-muted">    جميع الحقوق محفوظة لدى # © 2023</p><!--modify it and connect it with admin dashboard-->
      </footer>
    </div>
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

function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000*200);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}


</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>