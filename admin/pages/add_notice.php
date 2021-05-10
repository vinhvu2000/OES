<?php
include '../../database/config.php';
include '../includes/check_user.php';
include '../../includes/uniques.php';
$matb = 'NT_'.get_rand_numbers(7);
$mamh = mysqli_real_escape_string($conn, $_POST['mamh']);
$ngaydang = date('Y/m/d h:i:s');
$tieude = mysqli_real_escape_string($conn, $_POST['tieude']);
$noidung = mysqli_real_escape_string($conn, $_POST['noidung']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "INSERT INTO thongbao (matb, mamh, ngaydang, capnhat, noidung, tieude)
VALUES ('$matb', '$mamh', '$ngaydang', '$ngaydang', '$noidung', '$tieude')";

if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../notice.php?rp=0061");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../notice.php?rp=0062");
}

$conn->close();
