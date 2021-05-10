<?php
include '../database/config.php';
$username = mysqli_real_escape_string($conn, $_POST['user']);
$password = md5($_POST['password']);
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/log.log", "a");
$sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
$sql1 = "SELECT * FROM sinhvien WHERE masv = '$username' ";
$result1 = $conn->query($sql1);

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
		if ($trangthai == "0") {
			header("location:../?rp=0002");
		}
		$location = $_SESSION['vaitro'];
		header("location:../$location/");
	}
} else {
	header("location:../?rp=0001");
}
$conn->close();
