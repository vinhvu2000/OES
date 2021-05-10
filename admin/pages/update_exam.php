<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$mabkt = $_GET['id'];
if (empty($_POST['maltc'])) {
    header("location:../edit-exam.php?id=$mabkt&rp=0038");
} else {
    $mamh = mysqli_real_escape_string($conn, substr($mabkt, 0, 7));
    $mabkt = mysqli_real_escape_string($conn, $mabkt);
    $tenbkt = ucwords(mysqli_real_escape_string($conn, $_POST['tenbkt']));
    $thoigian = mysqli_real_escape_string($conn, $_POST['thoigian']);
    $diemtoithieu = mysqli_real_escape_string($conn, $_POST['diemtoithieu']);
    $solan = mysqli_real_escape_string($conn, $_POST['solan']);
    $deadline = mysqli_real_escape_string($conn, date("Y-m-d H:i:s", strtotime($_POST['deadline'])));
    $cachtinh = mysqli_real_escape_string($conn, $_POST['cachtinh']);
    $check = count($_POST['maltc']);
    $t = '';
    foreach ($_POST['maltc'] as $s) {
        $t = $t == '' ? $s : ($t . '|' . $s);
    }
    $maltc = mysqli_real_escape_string($conn, $t);
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);
    $sql = "UPDATE baikt SET tenbkt = '$tenbkt', thoigian = '$thoigian', solan = '$solan', cachtinh = '$cachtinh', diemtoithieu = '$diemtoithieu', deadline = '$deadline', ghichu = '$ghichu', maltc ='$maltc' WHERE mabkt='$mabkt'";
    if ($conn->query($sql) === true) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../examinations.php?rp=0046");
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../examinations.php?rp=0047");
    }
}
$conn->close();
