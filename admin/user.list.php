<?php
    include('auth.php');
    include('../config.php');
    $GID = null;
    if(isset($_GET['GID'])){
        $GID = $_GET['GID'];
    }

    $sql = "SELECT * FROM radusergroup WHERE groupname = '$GID'";
    $result = $conn->query($sql);

    $sql3  = "SELECT * FROM radgroupcheck GROUP BY groupname";
    $result3 = $conn->query($sql3);
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
                <h5>จัดการผู้ใช้งาน</h5>
                <form action="" method="get" class="form-inline">
                    <div class="form-group my-2">
                    <label class="mr-sm-1 my-1" for="">เลือกกลุ่ม</label>
                        <select class="form-control" name="GID" id="GID">
                            <option>โปรดเลือก</option>
                            <?php foreach($result3 as $data3){ ?>
                            <option value="<?php echo $data3['groupname']; ?>" <?php echo ($GID==$data3['groupname'])? "selected" : ""; ?>><?php echo $data3['groupname']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary ml-1">ค้นหา</button>
                    <?php if(isset($_GET['GID']) AND ($_GET['GID']!=="โปรดเลือก") AND ($_GET['GID']!=="")){ ?>
                    <a href="user.add.gen.php?GID=<?php echo $GID; ?>" class="btn btn-info ml-auto">เพิ่มผู้ใช้งานแบบกำหนด</a>
                    <a href="user.add.php?GID=<?php echo $GID; ?>" class="btn btn-info ml-3">เพิ่มผู้ใช้งานใหม่</a>
                    <?php } ?>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#ลำดับ</th>
                                    <th class="text-center">ชื่อ</th>
                                    <th class="text-center">ชื่อผู้ใช้</th>
                                    <th class="text-center">รหัสผ่าน</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">จัดการสถานะ</th>
                                    <th class="text-center">การจัดการ</th>
                                </tr>
                            </thead>
                            <?php if(isset($_GET['GID']) AND ($_GET['GID']!=="โปรดเลือก") AND ($_GET['GID']!=="")){ ?>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach($result as $data){ 
                                        $sql2 = "SELECT (SELECT value FROM radgroupcheck WHERE groupname = '$data[groupname]' AND attribute = 'Tunnel-Private-Group-Id') as vlan,
                                                        (SELECT value FROM radcheck WHERE username = '$data[username]' AND attribute = 'Auth-Type') as authtype,
                                                        (SELECT value FROM radcheck WHERE username = '$data[username]' AND attribute = 'Cleartext-Password') as password,
                                                        (SELECT name FROM account WHERE username = '$data[username]') as name
                                        
                                                ";
                                        $result2 = $conn->query($sql2);
                                        $data2 = $result2->fetch_assoc();

                                        if(($data2['authtype']=="Reject")){
                                            $color = "danger";
                                            $status = "ปิดการใช้งาน";
                                            $color2 = "success";
                                            $status2 = "เปิดใช้งาน";
                                            $url = "user.enable.php";
                                        }else{
                                            $color = "success";
                                            $status = "เปิดใช้งาน";
                                            $color2 = "danger";
                                            $status2 = "ปิดการใช้งาน";
                                            $url = "user.disable.php";
                                        }
                                        $i++;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $data2['name']; ?></td>
                                    <td class="text-center"><?php echo $data['username']; ?></td>
                                    <td class="text-center"><?php echo $data2['password']; ?></td>
                                    <td class="text-center"><h4><span class="badge badge-<?php echo $color; ?>"><?php echo $status; ?></span></h4></td>
                                    <td class="text-center"><a href="<?php echo $url; ?>?UID=<?php echo $data['username']; ?>&GID=<?php echo $data['groupname']; ?>" class="btn btn-outline-<?php echo $color2; ?>"><?php echo $status2; ?></a></td>
                                    <td class="text-center">
                                        <a href="user.edit.php?UID=<?php echo $data['username']; ?>&GID=<?php echo $data['groupname']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
                                        <a href="javascript:if(confirm('คุณต้องการลบกลุ่มผู้ใช้งานนี้หรือไม่')==true){ location.href='doUser.php?UID=<?php echo $data['username']; ?>&GID=<?php echo $data['groupname']; ?>&act=del' }" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                            <?php }else{ ?>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="7"><h3>กรุณาเลือกกลุ่ม</h3></td>
                                <tr>
                            </tbody>
                            <?php } ?>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>