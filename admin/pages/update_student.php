<?php
include '../../database/config.php';
$masv = $_POST['masv'];
$hotendem = ucwords(mysqli_real_escape_string($conn, $_POST['hotendem']));
$ten = ucwords(mysqli_real_escape_string($conn, $_POST['ten']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
$makhoa = mysqli_real_escape_string($conn, $_POST['makhoa']);
$diachi = ucwords(mysqli_real_escape_string($conn, $_POST['diachi']));
$ngaysinh = mysqli_real_escape_string($conn, date('Y-m-d', strtotime($_POST['ngaysinh'])));
$gioitinh = mysqli_real_escape_string($conn, $_POST['gioitinh'] == 'Male' ? 'Nam' : 'Nữ');
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "SELECT * FROM sinhvien WHERE (email = '$email 'AND masv !='$masv') OR (sdt = '$sdt' AND masv !='$masv')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $e = $row['email'];
        $s = $row['sdt'];
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        if ($e == $email) {
            header("location:../edit-student.php?rp=0029&id=$masv");
        } else {
            if ($s == $sdt) {
                header("location:../edit-student.php?rp=0030&id=$masv");
            } else {
            }
        }
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
    
    $sql = "UPDATE sinhvien SET hotendem = '$hotendem', ten = '$ten', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh', diachi = '$diachi', email = '$email', sdt = '$sdt', makhoa = '$makhoa' WHERE masv='$masv'";

    if ($conn->query($sql) === true) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../edit-student.php?rp=0031&id=$masv");
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../edit-student.php?rp=0032&id=$masv");
    }
}

$conn->close();
