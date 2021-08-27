<?php
    include('auth.php');
    include('../config.php');
    $UID = null;
    if(isset($_SESSION['username'])){
        $UID = $_SESSION['username'];
    }
    $name = $_POST['name'];

    if($UID == "admin"){
        $sql = "UPDATE admin SET first_name = '$name' WHERE username = '$UID'";
        $_SESSION['name'] = $name;
    }else{
        $sql = "UPDATE account SET name = '$name' WHERE username = '$UID'";
        $_SESSION['name'] = $name;
    }
    $conn->query($sql);
    header('Location: profile.php');
    exit;
?>