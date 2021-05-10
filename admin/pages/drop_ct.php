<?php
include '../../database/config.php';
$maltc = mysqli_real_escape_string($conn, $_GET['id']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "DELETE FROM loptinchi WHERE maltc='$maltc'";

if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../categories.php?rp=0020");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../categories.php?rp=0021");
}

$conn->close();
