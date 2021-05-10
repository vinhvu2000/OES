<?php
include '../../database/config.php';
$now = date('Y-m-d H:i:s');
$open = fopen("../../logs/log.log", "a");

$makhoa = mysqli_real_escape_string($conn, strtoupper($_POST['makhoa']));
$tenkhoa = ucwords(mysqli_real_escape_string($conn, $_POST['tenkhoa']));
$_SESSION['tenkhoa'] = $_POST['tenkhoa'];
$_SESSION['makhoa'] = $_POST['makhoa'];
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
$sql = "SELECT * FROM khoa WHERE makhoa = '$makhoa'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fwrite($open, "[$now]: admin thêm khoa thất bại, mã khoa $makhoa đã tồn tại trong CSDL\n");
        fclose($open);
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../departments.php?rp=0011#tab6");
    }
} else {
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);
    $sql = "SELECT * FROM khoa WHERE tenkhoa = '$tenkhoa'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            fwrite($open, "[$now]: admin thêm khoa thất bại, tên khoa $tenkhoa đã tồn tịa trong CSDL\n");
            fclose($open);
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../departments.php?rp=0012#tab6");
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
        $sql = "INSERT INTO khoa (makhoa, tenkhoa)
        VALUES ('$makhoa', '$tenkhoa')";

        if ($conn->query($sql) === true) {
            fwrite($open, "[$now]: admin thêm khoa thành công (mã khoa: $makhoa, tên khoa: $tenkhoa)\n");
            fclose($open);
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../departments.php?rp=0013");
        } else {
            fwrite($open, "[$now]: admin thêm khoa thất bại, không thêm được vào CSDL\n");
            fclose($open);
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../departments.php?rp=0014#tab6");
        }
    }
}
$conn->close();
