<?php

include 'database/config.php';
if (isset($_GET['rp'])) {
$error_code = mysqli_real_escape_string($conn, $_GET['rp']);
$sql = "SELECT * FROM phanhoi WHERE code = '$error_code'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	 $ms = 1;
     $description = $row['noidung'];
    }
} else {
	$ms = 0;
}
$conn->close();
}
?>