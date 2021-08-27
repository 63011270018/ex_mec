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
            <div class="card-header">เพิ่มผู้ใช้งานแบบกำหนด</div>
            <div class="card-body">
                <form action="doUser.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#ลำดับ</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>รหัสผ่าน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=1;$i<=$_POST['count'];$i++){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i; ?></td>
                                        <td><input type="text" class="form-control" name="username[]" id="group" aria-describedby="helpId" placeholder="" value="<?php echo $_POST['username']."@".$i; ?>" readonly></td>
                                        <td><input type="text" class="form-control" name="password[]" id="group" aria-describedby="helpId" placeholder="" value="<?php echo $_POST['username']."@".$i; ?>" readonly></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <input type="hidden" name="act" value="add.gen">
                    <input type="hidden" name="GID" value="<?php echo $_POST['GID']; ?>">
                    <button type="submit" class="btn btn-success pull-right">เพิ่มผู้ใช้งานแบบกำหนด</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>