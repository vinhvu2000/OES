<?php
include '../../database/config.php';
include '../../includes/uniques.php';
session_start();
$_SESSION['dem'] = $_POST['dem'];
$_SESSION['mamh'] = $_POST['mamh'];
$_SESSION['mabkt'] = $_POST['mabkt'];
$_SESSION['cauhoi'] = $_POST['cauhoi'];
$_SESSION['dapan1'] = $_POST['dapan1'];
$_SESSION['dapan2'] = $_POST['dapan2'];
$_SESSION['dapan3'] = $_POST['dapan3'];
$_SESSION['dapan4'] = $_POST['dapan4'];
$_SESSION['dapan5'] = $_POST['dapan5'];
$_SESSION['dapan6'] = $_POST['dapan6'];
$_SESSION['image'] = addslashes(file_get_contents($_FILES['image']['tmp_name']));
if ($_POST['check'] == 'false') {
    header("location:../questions.php#tab5");
} else {
    $t = '';
    foreach ($_POST['dapan'] as $s) {
        $t = $t == '' ? $s : ($t . '|' . $s);
    }
    $_SESSION['dapan'] = $t;
    if ($_SESSION['dapan1'] == '') {
        header("location:../questions.php?rp=0049#tab5");
    } elseif ($_SESSION['dapan'] == '') {
        header("location:../questions.php?rp=0048#tab5");
    } elseif ($_SESSION[$_SESSION['dapan']] == '' && strlen($_SESSION['dapan'])==5) {
        header("location:../questions.php?rp=0050#tab5");
    } else {
        $mach =  mysqli_real_escape_string($conn, 'QS_' . get_rand_numbers(7));
        $mamh = mysqli_real_escape_string($conn, $_SESSION['mamh']);
        $mabkt = mysqli_real_escape_string($conn, $_SESSION['mabkt']);
        $cauhoi = mysqli_real_escape_string($conn, $_SESSION['cauhoi']);
        $dapan1 = mysqli_real_escape_string($conn, $_SESSION['dapan1']);
        $dapan2 = mysqli_real_escape_string($conn, $_SESSION['dapan2']);
        $dapan3 = mysqli_real_escape_string($conn, $_SESSION['dapan3']);
        $dapan4 = mysqli_real_escape_string($conn, $_SESSION['dapan4']);
        $dapan5 = mysqli_real_escape_string($conn, $_SESSION['dapan5']);
        $dapan6 = mysqli_real_escape_string($conn, $_SESSION['dapan6']);
        $dapan = mysqli_real_escape_string($conn, $_SESSION['dapan']);
        $image = mysqli_real_escape_string($conn, $_SESSION['image']);
        $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
        $time_start = microtime(true);

        $sql = "INSERT INTO cauhoi (mach,mabkt,loaich,noidung,dapan1,dapan2,dapan3,dapan4,dapan5,dapan6,dapan,image)
           VALUES ('$mach','$mabkt','1','$cauhoi','$dapan1','$dapan2','$dapan3','$dapan4','$dapan5','$dapan6','$dapan','$image');";
        if ($conn->query($sql) === true) {
            unset($_SESSION['cauhoi']);
            unset($_SESSION['dapan1']);
            unset($_SESSION['dapan2']);
            unset($_SESSION['dapan3']);
            unset($_SESSION['dapan4']);
            unset($_SESSION['dapan5']);
            unset($_SESSION['dapan6']);
            unset($_SESSION['dapan']);
            unset($_SESSION['dem']);
            unset($_SESSION['image']);
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../questions.php?rp=0051#tab5");
        } else {
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../questions.php?rp=0052#tab5");
        }
    }
}
