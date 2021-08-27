<?php
    include('auth.php');
    include('../config.php');
    $GID = null;
    if(isset($_GET['GID'])){
        $GID = $_GET['GID'];
    }
    $UID = null;
    if(isset($_GET['UID'])){
        $UID = $_GET['UID'];
    }

    $sql = "SELECT (SELECT name FROM account WHERE username = '$UID') as name,
                        (SELECT username FROM radcheck WHERE username = '$UID' GROUP BY username) as username,
                        (SELECT value FROM radcheck WHERE username = '$UID' AND attribute = 'Cleartext-Password') as password,
                        (SELECT groupname FROM radusergroup WHERE username = '$UID') as groupname";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
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
            <div class="card-header">แก้ไขผู้ใช้งาน</div>
            <div class="card-body">
                <form action="doUser.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="group">กลุ่ม</label>
                            <input type="text" class="form-control" name="group" id="group" aria-describedby="helpId" placeholder="" value="<?php echo $data['groupname']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="username">ชื่อ</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" value="<?php echo $data['name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="username">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="" value="<?php echo $data['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="password">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" value="<?php echo $data['password']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <input type="hidden" name="act" value="edit">
                    <input type="hidden" name="GID" value="<?php echo $data['groupname']; ?>">
                    <button type="submit" class="btn btn-success pull-right">แก้ไขผู้ใช้งาน</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>