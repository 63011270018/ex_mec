<?php
    include('auth.php');
    $GID = null;
    if(isset($_GET['GID'])){
        $GID = $_GET['GID'];
    }
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
            <div class="card-header">เพิ่มผู้ใช้งานแบบกำหนด</div>
            <div class="card-body">
                <form action="user.add.gen.list.php" method="post">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="group">กลุ่ม</label>
                            <input type="text" class="form-control" name="group" id="group" aria-describedby="helpId" placeholder="" value="<?php echo $GID; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="username">ชื่อเริ่มต้น</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="count">จำนวน</label>
                            <input type="text" class="form-control" name="count" id="count" aria-describedby="helpId" placeholder="" value="1">
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <input type="hidden" name="act" value="add">
                    <input type="hidden" name="GID" value="<?php echo $GID; ?>">
                    <button type="submit" class="btn btn-success pull-right">เพิ่มผู้ใช้งานแบบกำหนด</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>