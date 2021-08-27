<?php
    include('auth.php');
    include('../config.php');

    $act = null;
    if(isset($_POST['act'])){
        $act  = $_POST['act'];
    }
    if(isset($_GET['act'])){
        $act  = $_GET['act'];
    }

    if($act == "add"){
        $name = $_POST['name'];
        $vlan = $_POST['vlan'];
        $idle = $_POST['idle'];
        $session = $_POST['session'];
        $url = $_POST['url'];
        $simu = $_POST['simu'];

        $sql = "INSERT INTO radgroupcheck VALUES(null,'$name','Service-Type',':=','Login-User'),
                                                (null,'$name','Simultaneous-Use',':=','$simu'),
                                                (null,'$name','Idle-Timeout',':=','$idle'),
                                                (null,'$name','Session-Timeout',':=','$session'),
                                                (null,'$name','WISPr-Redirection-URL',':=','$url'),
                                                (null,'$name','Tunnel-Type',':=','13'),
                                                (null,'$name','Tunnel-Medium-Type',':=','6'),
                                                (null,'$name','Tunnel-Private-Group-Id',':=','$vlan')";
        if($conn->query($sql)){
            header('Location: group.list.php');
        }else{
            header('Location: group.add.php');
        }
        exit;
    }
    if($act == "edit"){
        $OLDname = $_POST['OLDname'];
        $name = $_POST['name'];
        $vlan = $_POST['vlan'];
        $idle = $_POST['idle'];
        $session = $_POST['session'];
        $url = $_POST['url'];
        $simu = $_POST['simu'];

        $sql = "UPDATE radgroupcheck SET value = '$vlan' WHERE groupname = '$OLDname' AND attribute = 'Tunnel-Private-Group-Id'";
        $conn->query($sql);
        $sql = "UPDATE radgroupcheck SET value = '$simu' WHERE groupname = '$OLDname' AND attribute = 'Simultaneous-Use'";
        $conn->query($sql);
        $sql = "UPDATE radgroupcheck SET value = '$url' WHERE groupname = '$OLDname' AND attribute = 'WISPr-Redirection-URL'";
        $conn->query($sql);
        $sql = "UPDATE radgroupcheck SET value = '$idle' WHERE groupname = '$OLDname' AND attribute = 'Idle-Timeout'";
        $conn->query($sql);
        $sql = "UPDATE radgroupcheck SET value = '$session' WHERE groupname = '$OLDname' AND attribute = 'Session-Timeout'";
        $conn->query($sql);
        $sql = "UPDATE radgroupcheck SET groupname = '$name' WHERE groupname = '$OLDname'";
        $conn->query($sql);
        header('Location: group.list.php');
        exit;
    }

    if($act == "del"){
        $GID = $_GET['GID'];
        $sql = "SELECT * FROM radusergroup WHERE groupname = '$GID'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "<script>alert('ไม่สามารถลบได้เพราะมีผู้ใช้อยู่ในกลุ่มนี้');</script>";
            echo "<script>window.location.href=\"group.list.php\"</script>";
            exit;
        }else{
            $sql = "DELETE FROM radgroupcheck WHERE groupname = '$GID'";
            $conn->query($sql);
            header('Location: group.list.php');
            exit;
        }
    }
    header('Location: group.list.php');
?>