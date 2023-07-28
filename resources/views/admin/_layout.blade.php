<!DOCTYPE html>
<html>
<head>
    
    <title>control panel</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/.css">
    <link rel="stylesheet" href="css/boosttrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8ee2d4d390.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <style>
        body{
    direction: rtl; 
    margin: 0px;
} 
.c{
    clear: both;
}
.w{
width: 1200px;
    margin-right: 50px;
    margin-left: auto;
    margin: 0px;
}
.loginAll{
    width: 600px;
    margin: 100px auto;
    margin-left: 340px;
    background-color: lightcyan;
    border: 1px solid #eee;
    padding: 10px;
}


input[type=file]{
    margin: 10px;
    padding: 7px;
    width: 80%;
    border: 1px solid #eee;
    font-family: tahoma;
    font-size: 12px;
    color: #000;}
input[type=submit]{
    width: 100%;
	padding: 8px;
	color: #ffffff;
	background: none #191970;
	border: none;
	border-radius: 6px;
	font-size: 18px;
	cursor: pointer;
	margin: 12px 0;
}

.ok{
    background: #5bcf71;
    padding: 15px 10px;
    text-align: center;
    font-family: tahoma;
    color: #fff;
    font-size: 14px;
    border: 1px solid #2da845
}
.all{
    max-width: 800px;
    width: 100%;
    margin: 50px auto;
    text-align: right
}
.admin-menu ul{
    list-style: none;
}

.adminbody{
    background: #fff;
    padding: 10px;
    font-family: tahoma;
    font-size: 13px;
    color: #555;
    border: 1px solid #eee;
}
label{
    text-align: right;
    font-family: tahoma;
    color: #555;
    font-size: 13px;
    font-weight: bold;
}
select{
    margin: 10px;
}
textarea{
    margin: 10px;
    margin-right: 80px;
}
.kw{
    overflow-y: hidden;
    overflow-x: hidden;
    border: 1px solid #000;
    direction: ltr;
}
.kw p{
    font-family: tahoma;
    font-size: 14px;
    font-style: normal;
    text-align: left;
    margin-left: 10px;
}
.prod ul{
    list-style: none;
    color: aqua;
    padding: 0px;
    margin: 0px;
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
/* ***************** */


span {
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

span::after {
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

#touchp {position: absolute; opacity: 0; height: 0px;}    

#touchp:checked + .slide {height: 450px;} 

#touch {position: absolute; opacity: 0; height: 0px;}    

#touch:checked + .slide {height: 450px;} 

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
        .nav-link{
            color: #000 !important;
        }
        @media (min-width: 1900px){
	.admin-menu {
		width: 100%;
	}
}
@media (min-width: 1367px){
	.admin-menu {
		width:  100%;
	}
}
@media (max-width: 991px) {
	.admin-menu{
		width:  100%;
	}
}
@media (max-width: 600px) {
	.admin-menu{
		width:  100%;
	}
}
        .navbar {
  background-color: #333;
}
.navbar a {
  font-size: 16px;
  text-align: center;
  padding: 9px 16px;
  text-decoration: none;
}
    .list-hor{
    float: right;
    list-style-type: none;
  margin: 0;
  padding: 0px 0px !important;
  overflow: hidden;
  background-color: ;
    
}
.list-hor li {
  float: right;
    margin-left: 19px !important;
}
.list-hor li a {
  display: block;
  color: #ff7f27;
  text-align: center;
  padding: 1px 10px !important;
  text-decoration: none;
 
}
    span::after {
    float: right;
    right: 10%;
    content: "" !important;
}</style>
    <script src="inc/ckeditor5-build-classic/ckeditor.js"></script>
</head>
<body style="overflow-x:hidden;width:100%">
    <div class="admin-menu">
    <div class="menubar">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="direction:rtl;background-color:wheat !important;"">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation"style="
    color: rgba(255,255,255,.5)!important;
    background-color: transparent !important;
">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" " id="navbarsExample03">
        <ul class="navbar-nav mr-auto"  style="margin-right:0px !important">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link " href="/admin/category" >التصنيفات</a>
            
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link " href="/admin/cards" >المنتجات</a>
           
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link"  href="/admin/info">اعدادات الموقع</a>
           
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="/admin/agents">الوكلاء</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="/admin/office">المكاتب</a>
          </li>
            <li class="nav-item active">
            
            <a class="nav-link" href="/admin/banners"> غلاف <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
                
            <a class="nav-link" href="/admin/terms">تعديل سياسة الخصوصية <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
                
            <a class="nav-link" href="/admin/service">تعديل شروط الخدمة <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
                
            <a class="nav-link" href="/admin/register">اضافة مسؤول <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item active">
                
            <a class="nav-link" href="editpass.php">تغيير كلمة السر <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="c"></div>
 </div>
 </div>
    <div class="all">  
@yield('content')

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
