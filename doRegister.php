<?php
    session_start();
    include('config.php');
    
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO radcheck VALUES(null,'$username','Cleartext-Password',':=','$password')";
    $conn->query($sql);
    $sql = "INSERT INTO radusergroup VALUES(null,'$username','student','1')";
    $conn->query($sql);
    $sql = "INSERT INTO account VALUES(null,'$username','$name')";
    $conn->query($sql);
    header('Location: login.php');
    exit;
?>