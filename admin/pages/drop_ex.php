<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "DELETE FROM baikt WHERE mabkt='$exid'";

if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start1 = microtime(true);
    $sql = "DELETE FROM cauhoi WHERE mabkt='$exid'";
    if ($conn->query($sql) === true) {
    } else {
    }
    $time_end1 = microtime(true);
    $time1 = $time_end1 - $time_start1;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time1 \n");
    fclose($open);
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../examinations.php?rp=0057");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../examinations.php?rp=0058");
}

$conn->close();
