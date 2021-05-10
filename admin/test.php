<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';

    include '../database/config.php';
    $masv = mysqli_real_escape_string($conn, $_GET['id']);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);
    $sql = "SELECT * FROM sinhvien WHERE masv = '$masv'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $masv = $row['masv'];
            $hotendem = $row['hotendem'];
            $ten = $row['ten'];
            $gioitinh = $row['gioitinh']=='Nam'?'Male':'Female';
            $ngaysinh = $row['ngaysinh'];
            $diachi = $row['diachi'];
            $email = $row['email'];
            $sdt = $row['sdt'];
            $makhoa = $row['makhoa'];
            $avtar = $row['avatar'];
            $qrcodetxt = 'ID:' . $masv . ', NAME: ' . $hotendem . ' ' . $ten . ', GENDER: ' . $gioitinh . ', MAKHOA : ' . $makhoa;
        }
    }
    $time_end = microtime(true);
$time = $time_end - $time_start;
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/sql.log", "a");
fwrite($open, "[$now]: $username | $sql | $time \n");
fclose($open);
