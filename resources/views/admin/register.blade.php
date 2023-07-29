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
    </style>
        </head>
    <body>
        <div class="container border rounded ">

            <div class="adminbody">
                <form action="/admin/register" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>إسم المستخدم</label>
                    <input type="text" name="name" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
                    <br>
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>
                    <label>البريد الالكتروني</label>
                    <input type="email" name="email" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
                    <br>
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>
                    <label>كلمة السر</label>
                    <input type="password" name="password" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
                    <br>
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>
                    <label> اعد كلمة السر</label>
                    <input type="password" name="password_confirmation" style="padding: 10px;width: 80%;border: 1px solid #eee;font-family: tahoma;font-size: 12px;color: #000;">
                    <br>
                    @error('password_confirmation')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <br>       
                    <input type="submit" value="إضافة مسؤول">
                    </form>
                </div>
        </div>
        
    </body>
</html>

