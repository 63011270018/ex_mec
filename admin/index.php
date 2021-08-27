<?php
    include('auth.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="../dist/css/bootstrap.css">
    <link rel="stylesheet" href="../dist/css/font-awesome.css">
    <!-- js -->
    <script src="../dist/js/jquery-3.4.1.min.js"></script>
    <script src="../dist/js/bootstrap.js"></script>
    <!-- <script src="../dist/js/popper.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @font-face {
            font-family: 'Kanit';
            src: url('../dist/fonts/Kanit-Regular.ttf');
        }
        body{
            font-family: Kanit;
        }
    </style>
</head>

<body style="background-color:aliceblue;">
    <?php include('include/nabvar.php'); ?>

    <div class="container">
        <div class="card shadow-lg mt-3">
            <div class="card-header">
                <h5>บริหารจัดการผู้ใช้อินเตอร์เน็ต</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <a href="user.list.php" class="text-decoration-none" style="color:#212529;">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="fa fa-5x fa-users text-center d-block"></i>
                                    <p class="h4 text-center mt-2">จัดการผู้ใช้งาน</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mt-4">
                        <a href="group.list.php" class="text-decoration-none" style="color:#212529;">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="fa fa-5x fa-users text-center d-block"></i>
                                    <p class="h4 text-center mt-2">จัดการกลุ่มผู้ใช้</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mt-4">
                        <a href="online.list.php" class="text-decoration-none" style="color:#212529;">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <i class="fa fa-5x fa-users text-center d-block"></i>
                                    <p class="h4 text-center mt-2">รายงานการใช้งานทั้งหมด</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>