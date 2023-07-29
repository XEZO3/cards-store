
<html>
    <head>
         <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8ee2d4d390.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    </head>
    <body dir="rtl">
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            .col-6{
                box-shadow: 5px 5px 5px;
            }
        </style>
        
        <div class="container  rounded mt-5" style="text-align: right">
            <div class="row justify-content-center mt-5">
                <div class="col-6 p-2 mt-5">
                    <form action="/admin/login" method="post">
                        @csrf
                        <div class="login-box">
                        <h1 style="text-shadow: 1px 1px">تسجيل الدخول</h1>
                        <div class="mb-3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="email" class="form-control" placeholder="example@email">
                            </div>
                            <div class="mb-3">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                        <input class="btn btn-primary" type="submit" name="login" value="تسجيل">
                         </div>
                        </form>   
                </div>
            </div>
        </div>
    </body>
</html>

 
