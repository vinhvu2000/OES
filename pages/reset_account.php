<?php
include '../database/config.php';
session_start();
$code = $_SESSION["code"];
$code2 = $_POST['code2'];
$myemail = $_SESSION['mail'];
if ($code == $code2) {
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM taikhoan INNER JOIN sinhvien ON taikhoan.username = sinhvien.masv WHERE email = '$myemail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql = "UPDATE taikhoan INNER JOIN sinhvien ON taikhoan.username = sinhvien.masv SET password ='$password' WHERE email ='$myemail'";
        }
    }
    if ($conn->query($sql) === true) {
        header("location:../index.php?rp=0005");
    }
} else {
    header("location:../forgot_pw.php?rp=0067");
}
$conn->close();
