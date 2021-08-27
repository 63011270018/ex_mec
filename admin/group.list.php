<?php
    include('auth.php');
    include('../config.php');

    $sql = "SELECT * FROM radgroupcheck GROUP BY groupname ORDER BY groupname";
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
                <h5>จัดการกลุ่มผู้ใช้งาน<a href="group.add.php" class="btn btn-info pull-right">เพิ่มกลุ่มผู้ใช้</a></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#ลำดับ</th>
                                    <th class="text-center">ชื่อกลุ่ม</th>
                                    <th class="text-center">VLAN</th>
                                    <th class="text-center">การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach($result as $data){ 
                                        $sql2 = "SELECT (SELECT value FROM radgroupcheck WHERE groupname = '$data[groupname]' AND attribute = 'Tunnel-Private-Group-Id') as vlan";
                                        $result2 = $conn->query($sql2);
                                        $data2 = $result2->fetch_assoc();
                                        $i++;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $data['groupname']; ?></td>
                                    <td class="text-center"><?php echo $data2['vlan']; ?></td>
                                    <td class="text-center">
                                        <a href="group.edit.php?GID=<?php echo $data['groupname']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
                                        <a href="javascript:if(confirm('คุณต้องการลบกลุ่มผู้ใช้งานนี้หรือไม่')==true){ location.href='doGroup.php?GID=<?php echo $data['groupname']; ?>&act=del' }" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
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