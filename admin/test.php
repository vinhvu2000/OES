<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';

    include '../database/config.php';
    $masv = mysqli_real_escape_string($conn, $_GET['id']);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $sql = "SELECT * FROM sinhvien WHERE masv = '$masv'";
    $time_start = microtime(true);
$result = $conn->query($sql);
$time_end = microtime(true);
$time = $time_end-$time_start;
$open2 = fopen("../logs/sql.log", "a");
fwrite($open2, "[$now]: $username | $sql | $time \n");
fclose($open2);
$sql = addslashes($sql);
$sql2 = "insert into sql_log(thoigian,user,query,time) values ('$now','$username','$sql','$time');";
 if (mysqli_query($conn, $sql2)) {
     echo "new record created successfully";
 } else {
     echo "error: " . $sql2 . "<br>" . mysqli_error($conn);
 }

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
