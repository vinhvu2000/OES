<?php
include '../includes/check_user.php';
include '../../database/config.php';
$now = date('Y-m-d H:i:s');
$open = fopen("../../logs/log.log", "a");
$oldpass = md5($_POST['oldpass']);
$username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
$time_start = microtime(true);

$sql = "SELECT * FROM taikhoan WHERE username = 'admin' AND password = '$oldpass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $new_password = md5($_POST['pass1']);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start1 = microtime(true);
    $sql1 = "UPDATE taikhoan SET password ='$new_password' WHERE username='admin'";
    if ($conn->query($sql1) === true) {
        fwrite($open, "[$now]: admin đổi mật khẩu thành công\n");
        fclose($open);
        $time_end1 = microtime(true);
        $time1 = $time_end1 - $time_start1;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time1 \n");
        fclose($open);
        header("location:../profile.php?rp=0005");
    } else {
        fwrite($open, "[$now]: admin đổi mật khẩu thất bại, mật khẩu mới và xác nhân mật khẩu không giống nhau\n");
        fclose($open);
        $time_end1 = microtime(true);
        $time1 = $time_end1 - $time_start1;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time1 \n");
        fclose($open);
        header("location:../profile.php?rp=0006");
    }
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
} else {
    fwrite($open, "[$now]: admin đổi mật khẩu thất bại, mật khẩu hiện tại không chính xác\n");
    fclose($open);
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    $now = date('Y-m-d H:i:s');
    $open = fopen("../../logs/sql.log", "a");
    fwrite($open, "[$now]: $username | $sql | $time \n");
    fclose($open);
    header("location:../profile.php?rp=0074");
}
$conn->close();
