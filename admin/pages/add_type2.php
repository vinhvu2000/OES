<?php
include '../../database/config.php';
include '../../includes/uniques.php';
session_start();
$_SESSION['mamh'] = $_POST['mamh'];
$_SESSION['mabkt'] = $_POST['mabkt'];
$_SESSION['cauhoi2'] = $_POST['cauhoi2'];
$_SESSION['answer'] = $_POST['answer'];
$_SESSION['image'] = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
if ($_POST['check'] == 'false') {
    header("location:../questions.php");
} else {
    if ($_SESSION['answer'] == '') {
        header("location:../questions.php?rp=0050");
    } else {
        $mach =  mysqli_real_escape_string($conn, 'QS_' . get_rand_numbers(7));
        $mamh = mysqli_real_escape_string($conn, $_SESSION['mamh']);
        $mabkt = mysqli_real_escape_string($conn, $_SESSION['mabkt']);
        $cauhoi2 = mysqli_real_escape_string($conn, $_SESSION['cauhoi2']);
        $answer = mysqli_real_escape_string($conn, $_SESSION['answer']);
        $image2 = mysqli_real_escape_string($conn, $_SESSION['image2']);
        $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
        $time_start = microtime(true);

        $sql = "INSERT INTO cauhoi (mach,mabkt,loaich,noidung,dapan,image)
           VALUES ('$mach','$mabkt','2','$cauhoi2','$answer','$image2');";

        if ($conn->query($sql) === true) {
            unset($_SESSION['cauhoi2']);
            unset($_SESSION['answer']);
            unset($_SESSION['image2']);
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../questions.php?rp=0051");
        } else {
            $time_end = microtime(true);
            $time = $time_end - $time_start;
            $now = date('Y-m-d H:i:s');
            $open = fopen("../../logs/sql.log", "a");
            fwrite($open, "[$now]: $username | $sql | $time \n");
            fclose($open);
            header("location:../questions.php?rp=0052");
        }
    }
}
// if ($_POST['check'] == 'false') {
//     $mamh = $_POST['mamh'];
//     if (isset($_POST['mabkt'])) {
//         $mabkt = $_POST['mabkt'];
//         if (isset($_POST['cong'])) {
//             $dem = $dem<1?1:($dem+1);
//             $cauhoi = $_POST['cauhoi'];
//             if()
//             header("location:../questions.php?mamh=$mamh&mabkt=$mabkt&dem=$dem&cauhoi=$cauhoi");
//         } else header("location:../questions.php?mamh=$mamh&mabkt=$mabkt");
//     } else header("location:../questions.php?mamh=$mamh");
// } else {

//     $mach = 'QS_' . get_rand_numbers(7);
//     $mabkt = mysqli_real_escape_string($conn, $_GET['mabkt']);
//     $loaich = mysqli_real_escape_string($conn, '1');
//     $noidung = mysqli_real_escape_string($conn, $_GET['cauhoi']);
//     for ($i = 1; $i <= 6; $i++) {
//         if ($i <= $_GET['dem']) {
//             $array[$i - 1] = mysqli_real_escape_string($conn, $_GET['dapan' . $i]);
//         } else $array[$i - 1] = mysqli_real_escape_string($conn, '-');
//     }
//     $dapan = mysqli_real_escape_string($conn, $_GET['dapan']);
//     $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//     $sql = "INSERT INTO cauhoi (mach,mabkt,loaich,noidung,dapan1,dapan2,dapan3,dapan4,dapan5,dapan6,dapan,image);
//     VALUES ('$mach','$mabkt','$loaich','$noidung','$array[0]','$array[1]','$array[2]','$array[3]','$array[4]','$array[5]','$dapan','$image')";

//     if ($conn->query($sql) === TRUE) {
//         header("location:../questions.php?rp=0357");
//     } else {
//         header("location:../questions.php?rp=3903");
//     }
//     $conn->close();
// }

    //$_GET['mabkt'];
    //$_GET['cauhoi'];
    //$mabkt;
    //$loaich;
    //$noidung;
    //$array[0];
    //$array[1];
    //$array[2];
    //$array[3];
    //$array[4];
    //$array[5];
    //$dapan;
    //$image;

    // $examid = mysqli_real_escape_string($conn, $_POST['exam']);
    // $question_id = 'QS-'.get_rand_numbers(6).'';
    // $question = mysqli_real_escape_string($conn, $_POST['question']);
    // $answer = mysqli_real_escape_string($conn, $_POST['answer']);

    // if (isset($_GET['type'])) {
    // $question_type = $_GET['type'];
    // if ($question_type == "mc") {
    // $opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
    // $opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
    // $opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
    // $opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);


    // $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {

    //     while($row = $result->fetch_assoc()) {
    //  header("location:../questions.php?rp=1185");
    //     }
    // } else {

    // }


    // }else if($question_type == "fib") {
    // $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {

    //     while($row = $result->fetch_assoc()) {
    // header("location:../add-questions.php?rp=1185&eid=$examid");
    //     }
    // } else {

    // $sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, answer)
    // VALUES ('$question_id', '$examid', 'FB', '$question', '$answer')";

    // if ($conn->query($sql) === TRUE) {
    //   header("location:../questions.php?rp=0357");
    // } else {
    //  header("location:../questions.php?rp=3903");
    // }


    // }


    // }else{

    // }

    // }else{

    // header("location:../");

    // }
