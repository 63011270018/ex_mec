<?php
    include('auth.php');
    include('../config.php');
    $UID = null;
    if(isset($_SESSION['username'])){
        $UID = $_SESSION['username'];
    }

    $OLDpassword = $_POST['OLDpassword'];
    $NEWpassword = $_POST['NEWpassword'];


    if($UID == "admin"){
        $sql = "SELECT passward as password FROM admin WHERE username = '$UID'";
    }else{
        $sql = "SELECT value as password FROM radcheck WHERE username = '$UID' AND attribute = 'Cleartext-Password'";
    }
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if($data['password'] == $OLDpassword){
        if($UID == "admin"){
            $sql = "UPDATE admin SET passward = '$NEWpassword' WHERE username = '$UID'";
        }else{
            $sql = "UPDATE radcheck SET value = '$NEWpassword' WHERE username = '$UID' AND attribute = 'Cleartext-Password'";
        }
        $conn->query($sql);
    }else{
        echo "<script>alert('รหัสเดิมผิด');</script>";
    }
    echo "<script>window.location.href=\"password.php\"</script>";
    // header('Location: profile.php');
    exit;
?>