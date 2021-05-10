<?php
include '../../database/config.php';
include '../../includes/uniques.php';
if ($_POST['check'] == 'false') {
    $mamh = $_POST['mamh'];
    header("location:../examinations.php?id=$mamh#tab6");
} else {
    if (empty($_POST['maltc'])) {
        header("location:../examinations.php?rp=0038#tab6");
    } else {
        $mamh = mysqli_real_escape_string($conn, $_POST['mamh']);
        $mabkt = mysqli_real_escape_string($conn, $mamh . "_" . get_rand_numbers(6));
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
        $ghichu = ucfirst(mysqli_real_escape_string($conn, $_POST['ghichu']));
        $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
        $time_start = microtime(true);

        $sql = "SELECT * FROM baikt WHERE tenbkt = '$tenbkt' AND mamh = '$mamh'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                header("location:../examinations.php?rp=0039#tab6");
            }
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
        } else {
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
            $time_start = microtime(true);

            $sql = "INSERT INTO baikt (mabkt, mamh, tenbkt, thoigian, solan, cachtinh, diemtoithieu, deadline, ghichu, maltc)
        VALUES ('$mabkt', '$mamh', '$tenbkt', '$thoigian', '$solan', '$cachtinh', '$diemtoithieu', '$deadline', '$ghichu', '$maltc');";
            if ($conn->query($sql) === true) {
                $time_end = microtime(true);
                $time = $time_end - $time_start;
                $now = date('Y-m-d H:i:s');
                $open = fopen("../../logs/sql.log", "a");
                fwrite($open, "[$now]: $username | $sql | $time \n");
                fclose($open);
                header("location:../examinations.php?rp=0040");
            } else {
                $time_end = microtime(true);
                $time = $time_end - $time_start;
                $now = date('Y-m-d H:i:s');
                $open = fopen("../../logs/sql.log", "a");
                fwrite($open, "[$now]: $username | $sql | $time \n");
                fclose($open);
                header("location:../examinations.php?rp=0041");
            }
        }
    }
}
$conn->close();
