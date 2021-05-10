<?php
include '../../database/config.php';
$masv = mysqli_real_escape_string($conn, $_POST['masv']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
$fullname = $_POST['hoten'];
$array = explode(' ', $fullname);
$ten = ucwords(mysqli_real_escape_string($conn, $array[count($array) - 1]));
unset($array[count($array) - 1]);
$hotendem = ucwords(mysqli_real_escape_string($conn, implode(' ', $array)));
$makhoa = mysqli_real_escape_string($conn, $_POST['makhoa']);
$diachi = ucwords(mysqli_real_escape_string($conn, $_POST['diachi']));
$ngaysinh = mysqli_real_escape_string($conn, date('Y-m-d', strtotime($_POST['ngaysinh'])));
$gioitinh = mysqli_real_escape_string($conn, $_POST['gioitinh'] == 'Male' ? 'Nam' : 'Nữ');
$password = md5(str_replace('/', '', date('d/m/Y', strtotime($_POST['ngaysinh']))));
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "SELECT * FROM sinhvien WHERE masv = '$masv' OR email = '$email' OR sdt = '$sdt'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $m = $row['masv'];
        $e = $row['email'];
        $s = $row['sdt'];
        if ($m == $masv) {
            header("location:../students.php?rp=0033#tab6");
        }
        if ($e == $email) {
            header("location:../students.php?rp=0029#tab6");
        }
        if ($s == $sdt) {
            header("location:../students.php?rp=0030#tab6");
        }
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

    $sql = "INSERT INTO sinhvien (masv, hotendem, ten, gioitinh, ngaysinh, diachi, email, sdt, makhoa) VALUES ('$masv','$hotendem', '$ten', '$gioitinh', '$ngaysinh', '$diachi', '$email', '$sdt', '$makhoa');";
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start1 = microtime(true);

    $sql1 = "INSERT INTO taikhoan(username ,password) VALUES ('$masv','$password');";

    if ($conn->query($sql) === true) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        if ($conn->query($sql1) === true) {
            $time_end1 = microtime(true);
            $time1 = $time_end1 - $time_start1;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../students.php?rp=0034");
        } else {
            $time_end = microtime(true);
            $time = $time_end - $time_start1;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../students.php?rp=0035");
        }
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../students.php?rp=0035");
    }
}
$conn->close();
