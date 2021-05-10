<?php
include '../../database/config.php';
$rsid = mysqli_real_escape_string($conn, $_GET['rid']);
$exid = mysqli_real_escape_string($conn, $_GET['eid']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "DELETE FROM tbl_assessment_records WHERE record_id='$rsid'";

if ($conn->query($sql) === true) {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../view-results.php?rp=7823&eid=$exid");
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../view-results.php?rp=1298&eid=$exid");
}

$conn->close();
