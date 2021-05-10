<?php
include '../../database/config.php';
$masv = mysqli_real_escape_string($conn, $_GET['id']);
$maltc = mysqli_real_escape_string($conn, $_GET['cid']);$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "DELETE FROM dangki WHERE (masv='$masv'AND maltc='$maltc')";
if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../view-student-in-class.php?rp=0072&cid=$maltc");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../view-student-in-class.php?rp=0073&cid=$maltc");
}
$conn->close();
