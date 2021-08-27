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
        $GID = $_POST['GID'];

        $sql = "INSERT INTO radusergroup VALUES(null, '".$_POST['username']."', '$GID', '1')";
        $conn->query($sql);
        $sql = "INSERT INTO radcheck VALUES(null, '".$_POST['username']."', 'Cleartext-Password', ':=', '".$_POST['password']."')";
        $conn->query($sql);
        $sql = "INSERT INTO account VALUES(null, '".$_POST['username']."', '".$_POST['username']."')";
        $conn->query($sql);

        header('Location: user.list.php?GID='.$GID);
        exit;
    }
    if($act == "add.gen"){
            $GID = $_POST['GID'];
            for($i=0;$i < count($_POST['username']);$i++){
                $sql = "INSERT INTO radusergroup VALUES(null, '".$_POST['username'][$i]."', '$GID', '1')";
                $conn->query($sql);
                $sql = "INSERT INTO radcheck VALUES(null, '".$_POST['username'][$i]."', 'Cleartext-Password', ':=', '".$_POST['password'][$i]."')";
                $conn->query($sql);
                $sql = "INSERT INTO account VALUES(null, '".$_POST['username'][$i]."', '".$_POST['username'][$i]."')";
                $conn->query($sql);
            }
            header('Location: user.list.php?GID='.$GID);
            exit;
        }
    if($act == "edit"){
        $GID = $_POST['GID'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "UPDATE account SET name = '$name' WHERE username = '$_POST[username]'";
        $conn->query($sql);
        $sql = "UPDATE radcheck SET value = '$password' WHERE username = '$_POST[username]' AND attribute = 'Cleartext-Password'";
        $conn->query($sql);
        
        header('Location: user.list.php?GID='.$GID);
        exit;
    }

    if($act == "del"){
        $UID = $_GET['UID'];
        $GID = $_GET['GID'];
        $sql = "DELETE FROM radcheck WHERE username = '$UID'";
        $conn->query($sql);
        $sql = "DELETE FROM radusergroup WHERE username = '$UID'";
        $conn->query($sql);
        header('Location: user.list.php?GID='.$_GET['GID']);
        exit;
    }
    header('Location: user.list.php');
?>