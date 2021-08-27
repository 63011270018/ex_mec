<?php
    session_start();
    include('config.php');
    

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND passward = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $data = $result->fetch_assoc();
        $_SESSION['name'] = $data['first_name'];
        $_SESSION['username'] = $data['username'];
        header('Location: admin/');
        exit;
    }else{
        header('Location: login.php');
        exit;
    }
    header('Location: login.php');
    exit;
?>