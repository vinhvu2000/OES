<?php
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

include '../includes/check_user.php';
include '../../database/config.php';

$sql = "UPDATE taikhoan SET avatar='$image' WHERE username='$masv'";

if ($conn->query($sql) === TRUE) {

$sql = "SELECT * FROM taikhoan WHERE username = '$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     $_SESSION['avatar'] = $row['avatar'];
	 header("location:../profile.php?rp=7823");
    }
} else {
header("location:../logout.php");
}




} else {
   header("location:../profile.php?rp=1298");
}

$conn->close();

?>