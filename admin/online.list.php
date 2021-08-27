<?php
    include('auth.php');
    include('../config.php');

    $sql = "SELECT * FROM `radacct` WHERE acctstoptime IS NULL";
    $result = $conn->query($sql);
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
                <h5>รายงานการใช้งานทั้งหมด <span class="badge badge-success">ONLINE</span></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#ลำดับ</th>
                                    <th class="text-center">ชื่อ</th>
                                    <th class="text-center">รหัสผู้ใช้</th>
                                    <th class="text-center">กลุ่มผู้ใช้</th>
                                    <th class="text-center">เวลาที่เริ่มใช้งาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach($result as $data){ 
                                        $sql2 = "SELECT (SELECT groupname FROM radusergroup WHERE username = '$data[username]') as groupname";
                                        $result2 = $conn->query($sql2);
                                        $data2 = $result2->fetch_assoc();
                                        $i++;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $data['username']; ?></td>
                                    <td class="text-center"><?php echo $data['username']; ?></td>
                                    <td class="text-center"><?php echo $data2['groupname']; ?></td>
                                    <td class="text-center"><?php echo $data['acctstarttime']; ?></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>