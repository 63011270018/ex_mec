<?php
    include('auth.php');
    include('../config.php');
    $GID = null;
    if(isset($_GET['GID'])){
        $GID = $_GET['GID'];
    }
    $sql = "SELECT  (SELECT groupname FROM radgroupcheck WHERE groupname = '$GID' GROUP BY groupname) as name,
                    (SELECT value FROM radgroupcheck WHERE groupname = '$GID' AND attribute = 'Simultaneous-Use') as simultaneous,
                    (SELECT value FROM radgroupcheck WHERE groupname = '$GID' AND attribute = 'Tunnel-Private-Group-Id') as vlan,
                    (SELECT value FROM radgroupcheck WHERE groupname = '$GID' AND attribute = 'Idle-Timeout') as idle,
                    (SELECT value FROM radgroupcheck WHERE groupname = '$GID' AND attribute = 'Session-Timeout') as session,
                    (SELECT value FROM radgroupcheck WHERE groupname = '$GID' AND attribute = 'WISPr-Redirection-URL') as url";
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
            <div class="card-header">เพิ่มกลุ่มผู้ใช้</div>
            <div class="card-body">
                <form action="doGroup.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">ชื่อกลุ่ม</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" value="<?php echo $data['name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="vlan">VLAN ID</label>
                            <input type="text" class="form-control" name="vlan" id="vlan" aria-describedby="helpId" placeholder="" value="<?php echo $data['vlan']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="idle">Idle-Timeout (วินาที)</label>
                            <input type="text" class="form-control" name="idle" id="idle" aria-describedby="helpId" placeholder="" value="<?php echo $data['idle']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="session">Session-Timeout (วินาที)</label>
                            <input type="text" class="form-control" name="session" id="session" aria-describedby="helpId" placeholder="" value="<?php echo $data['session']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="url">WISPr-Redirection-URL</label>
                            <input type="text" class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="" value="<?php echo $data['url']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="simu">จำนวนอุปกรณ์</label>
                            <input type="text" class="form-control" name="simu" id="simu" aria-describedby="helpId" placeholder="" value="<?php echo $data['simultaneous']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <input type="hidden" name="act" value="edit">
                    <input type="hidden" name="OLDname" value="<?php echo $data['name']; ?>">
                    <button type="submit" class="btn btn-success pull-right">เพิ่มกลุ่มผู้ใช้</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>