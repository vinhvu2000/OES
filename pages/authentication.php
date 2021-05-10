<?php
include '../database/config.php';
$username = mysqli_real_escape_string($conn, $_POST['user']);
$password = md5($_POST['password']);
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/log.log", "a");
$time_start = microtime(true);
$sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
$time_end = microtime(true);
$time = $time_end-$time_start;
$time_start = microtime(true);
$sql1 = "SELECT * FROM sinhvien WHERE masv = '$username' ";
$result1 = $conn->query($sql1);
$time_end = microtime(true);
$time1 = $time_end-$time_start;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['vaitro']=$row['vaitro'];
        $trangthai = $row['trangthai'];
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $_SESSION['hotendem']=$row['hotendem'];
                $_SESSION['ten']=$row['ten'];
                $_SESSION['gioitinh']=$row['gioitinh'];
                $_SESSION['ngaysinh']=$row['ngaysinh'];
                $_SESSION['diachi']=$row['diachi'];
                $_SESSION['email']=$row['email'];
                $_SESSION['sdt']=$row['sdt'];
                $_SESSION['makhoa']=$row['makhoa'];
                $_SESSION['avatar']=$row['avatar'];
                $_SESSION['masv']=$row['masv'];
                $_SESSION['malop']= $row['malop'];
            }
        }

        fwrite($open, "[$now]: $username đăng nhập thành công \n");
        fclose($open);
        $sql = addslashes($sql);
        $sql1 = addslashes($sql1);
        $sql2 = "INSERT INTO sql_log(thoigian,user,query,time) VALUES ('$now','$username','$sql','$time'),('$now','$username','$sql1','$time1');";
        if (mysqli_query($conn, $sql2)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
        if ($trangthai == "0") {
            header("location:../?rp=0002");
        }
        $location = $_SESSION['vaitro'];
        header("location:../$location/");
    }
} else {
    $sql = addslashes($sql);
    $sql2 = "INSERT INTO sql_log(thoigian,user,query,time) VALUES ('$now','$username','$sql','$time');";
    if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    header("location:../?rp=0001");
}

$conn->close();
