<?php
include '../../database/config.php';
$mamh = strtoupper(mysqli_real_escape_string($conn, $_POST['mamh']));
$tenmh =   ucfirst(strtolower(mysqli_real_escape_string($conn, $_POST['tenmh'])));
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "SELECT * FROM monhoc WHERE mamh = '$mamh'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../subject.php?rp=0024");
    }
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);

    $sql = "INSERT INTO monhoc (mamh, tenmh) VALUES ('$mamh', '$tenmh')";
    if ($conn->query($sql) === true) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../subject.php?rp=0025");
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../subject.php?rp=0026");
    }
}
$conn->close();
