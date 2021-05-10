<?php
include '../../database/config.php';
$masv = mysqli_real_escape_string($conn, $_GET['id']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "UPDATE taikhoan SET trangthai='1' WHERE username='$masv'";

if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../students.php?rp=0007");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../students.php?rp=0008");
}

$conn->close();
