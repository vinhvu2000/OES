<?php
include '../database/config.php';
session_start();
$masv = $_SESSION['user'];
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	
	$masv = $_SESSION['user'];
	$hotendem = $_SESSION['hotendem'];
	$ten = $_SESSION['ten'];
	$email = $_SESSION['email'];
	$gioitinh = $_SESSION['gioitinh'] == 'Nam' ? 'Male' : 'Female';
	$avatar = $_SESSION['avatar'];
	$makhoa = $_SESSION['makhoa'];
	$sdt = $_SESSION['sdt'];
	$diachi = $_SESSION['diachi'];
	$ngaysinh = $_SESSION['ngaysinh'];
	// if ($_SESSION['vaitro'] == "student") {
	// } else {
	// 	header("location:../?rp=0068");
	// }
} else {
	header("location:../?rp=0004");
}
$conn->close();
