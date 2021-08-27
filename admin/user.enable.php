<?php
    include('auth.php');
    include('../config.php');
    $UID = null;
    if(isset($_GET['UID'])){
        $UID = $_GET['UID'];
    }
    $sql = "DELETE FROM radcheck WHERE username = '$UID' AND attribute = 'Auth-Type'";
    $conn->query($sql);
    header('Location: user.list.php?GID='.$_GET['GID']);
    exit;
?>