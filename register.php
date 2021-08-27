<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/font-awesome.css">
    <!-- js -->
    <script src="dist/js/jquery-3.4.1.min.js"></script>
    <script src="dist/js/bootstrap.js"></script>
    <!-- <script src="dist/js/popper.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
            font-family: 'Kanit';
            src: url('dist/fonts/Kanit-Regular.ttf');
        }
        body{
            font-family: Kanit;
        }
    </style>
</head>

<body style="background-color:aliceblue;">
    <div class="container">
        <div class="mx-auto col-md-4">
            <img src="dist/logo.png"width="120" class="mx-auto d-block">
            <h4 class="text-center pt-3">ลงทะเบียน<br>ระบบการบริหาร<br>จัดการข้อมูลผู้ใช้งานระบบ<br>เครือข่ายอินเตอร์เน็ต</h4>
            <form action="doRegister.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="ชื่อจริง : ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="ชื่อผู้ใช้ : ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="รหัสผ่าน : ">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">สมัครสมาชิก</button>
                </div>
            </form>
            <h5 class="text-center">หรือ</h5>
            <div class="form-group">
                <a href="login.php" class="btn btn-outline-primary btn-block">เข้าสู่ระบบ</a>
            </div>
        </div>
    </div>
</body>

</html>