<?php
include '../../database/config.php';
$masv = mysqli_real_escape_string($conn, $_POST['masv']);
$maltc = mysqli_real_escape_string($conn, $_POST['maltc']);
$mamh = mysqli_real_escape_string($conn, substr($maltc, 0, 7));
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "SELECT * FROM dangki WHERE masv = '$masv' AND maltc LIKE '%$mamh%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        header("location:../view-student-in-class.php#tab6?rp=0069");
    }
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);

    $sql = "INSERT INTO dangki (masv,maltc) VALUES ('$masv','$maltc');";
    if ($conn->query($sql) === true) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../view-student-in-class.php?rp=0070&cid=$maltc#tab6");
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../view-student-in-class.php?rp=0071&cid=$maltc#tab6");
    }
}
$conn->close();
