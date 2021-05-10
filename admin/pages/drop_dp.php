<?php
include '../includes/check_user.php';
include '../../database/config.php';
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "UPDATE tbl_users SET avatar='' WHERE user_id='$myid'";

if ($conn->query($sql) === true) {
    $_SESSION['avatar'] = '';
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../profile.php?rp=7823");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../profile.php?rp=1298");
}

$conn->close();
