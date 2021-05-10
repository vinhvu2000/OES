<?php
include '../../database/config.php';
include '../includes/check_user.php';
include '../../includes/uniques.php';
$matb = $_POST['matb'];
$capnhat = date('Y/m/d h:i:s');
$tieude = mysqli_real_escape_string($conn, $_POST['tieude']);
$noidung = mysqli_real_escape_string($conn, $_POST['noidung']);$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "UPDATE thongbao SET capnhat = '$capnhat', noidung = '$noidung', tieude = '$tieude'  WHERE matb='$matb'";

if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../edit-notice.php?rp=0063&id=$matb");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../edit-notice.php?rp=0064&id=$matb");
}

$conn->close();
