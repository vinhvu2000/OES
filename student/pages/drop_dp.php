<?php
include '../includes/check_user.php';
include '../../database/config.php';

$sql = "UPDATE taikhoan SET avatar='' WHERE username='$masv'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['avatar'] = '';
	header("location:../profile.php?rp=7823");
} else {
   header("location:../profile.php?rp=1298");
}

$conn->close();
?>