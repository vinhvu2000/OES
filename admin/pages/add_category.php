<?php
include '../../database/config.php';
$now = date('Y-m-d H:i:s');
$open = fopen("../../logs/log.log", "a");

$tenmh = mysqli_real_escape_string($conn, $_POST['tenmh']);
$lichhoc = mysqli_real_escape_string($conn, $_POST['lichhoc']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "SELECT * FROM monhoc WHERE tenmh = '$tenmh'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $mamh = $row['mamh'];
}
$time_end = microtime(true);
$time = $time_end - $time_start;
$now = date('Y-m-d H:i:s');
$open = fopen("../../logs/sql.log", "a");
fwrite($open, "[$now]: $username | $sql | $time \n");
fclose($open);
$s = $mamh . '_' . $_POST['stt'];
$maltc = mysqli_real_escape_string($conn, $s);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "SELECT * FROM loptinchi WHERE maltc = '$maltc'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fwrite($open, "[$now]: admin thêm lớp thất bại, mã lớp tín chỉ $maltc đã tồn tại trong CSDL\n");
        fclose($open);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../categories.php?rp=0017");
    }
} else {
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    $sql = "INSERT INTO loptinchi (maltc, mamh, lichhoc)
VALUES ('$maltc', '$mamh','$lichhoc')";
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);

    if ($conn->query($sql) === true) {
        fwrite($open, "[$now]: admin thêm lớp $maltc thành công\n");
        fclose($open);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");

        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../categories.php?rp=0018");
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");

        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        fwrite($open, "[$now]: admin thêm lớp $maltc thất bại, không thêm được vào CSDL \n");
        fclose($open);
        header("location:../categories.php?rp=0019");
    }
}
$conn->close();
