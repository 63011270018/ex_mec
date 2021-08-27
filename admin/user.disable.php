<?php
    include('auth.php');
    include('../config.php');
    $UID = null;
    if(isset($_GET['UID'])){
        $UID = $_GET['UID'];
    }
    $sql = "INSERT INTO radcheck VALUES(null, '$UID', 'Auth-Type', ':=', 'Reject');";
    $conn->query($sql);
    header('Location: user.list.php?GID='.$_GET['GID']);
    exit;
?>