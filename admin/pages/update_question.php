<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$mach = $_GET['id'];
if ($_GET['type'] == 1) {
    $image = $_POST['image'] != '' ? addslashes(file_get_contents($_FILES['image']['tmp_name'])) : $image;
    $noidung = $_POST['noidung'];
    $dem = $_POST['dem'];
    $dapan1 = $_POST['dapan1'];
    $dapan2 = $_POST['dapan2'];
    $dapan3 = $_POST['dapan3'];
    $dapan4 = $_POST['dapan4'];
    $dapan5 = $_POST['dapan5'];
    $dapan6 = $_POST['dapan6'];
    if ($_POST['check'] == 'false') {
        header("location:../edit-question.php?id=$mach&dem=$dem");
    } else {
        foreach ($_POST['dapan'] as $s) {
            $t = $t == '' ? $s : ($t . '|' . $s);
        }
        $dapan = mysqli_real_escape_string($conn, $t);

        if ($dapan1 == '') {
            header("location:../edit-question.php?rp=0049&id=$mach&dem=$dem");
        } elseif ($dapan == '') {
            header("location:../edit-question.php?rp=0048&id=$mach&dem=$dem");
        } else {
            $noidung = mysqli_real_escape_string($conn, $noidung);
            $dapan1 = mysqli_real_escape_string($conn, $dapan1);
            $dapan2 = mysqli_real_escape_string($conn, $dapan2);
            $dapan3 = mysqli_real_escape_string($conn, $dapan3);
            $dapan4 = mysqli_real_escape_string($conn, $dapan4);
            $dapan5 = mysqli_real_escape_string($conn, $dapan5);
            $dapan6 = mysqli_real_escape_string($conn, $dapan6);
            $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
            $time_start = microtime(true);

            $sql = "UPDATE cauhoi SET noidung='$noidung', dapan1='$dapan1', dapan2='$dapan2', dapan3='$dapan3', dapan4='$dapan4', dapan5='$dapan5', dapan6='$dapan6', dapan='$dapan' ,image='$image' WHERE mach='$mach'";

            if ($conn->query($sql) === true) {
                $time_end = microtime(true);
                $time = $time_end - $time_start;
                $now = date('Y-m-d H:i:s');
                $open = fopen("../../logs/sql.log", "a");
                fwrite($open, "[$now]: $username | $sql | $time \n");
                fclose($open);
                header("location:../edit-question.php?rp=0055&id=$mach");
            } else {
                $time_end = microtime(true);
                $time = $time_end - $time_start;
                $now = date('Y-m-d H:i:s');
                $open = fopen("../../logs/sql.log", "a");
                fwrite($open, "[$now]: $username | $sql | $time \n");
                fclose($open);
                header("location:../edit-question.php?rp=0056&id=$mach");
            }
        }
    }
} else {
    $noidung = mysqli_real_escape_string($conn, $_POST['noidung']);
    $dapan = mysqli_real_escape_string($conn, $_POST['answer']);
    $image = $_POST['image'] != '' ? addslashes(file_get_contents($_FILES['image']['tmp_name'])) : $image;
    $username = isset($_SESSION['user'])?$_SESSION['user']:'Unknow';
    $time_start = microtime(true);

    $sql = "UPDATE cauhoi SET noidung='$noidung', dapan='$dapan', image='$image' WHERE mach='$mach'";

    if ($conn->query($sql) === true) {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../edit-question.php?rp=0055&id=$mach");
    } else {
        $time_end = microtime(true);
        $time = $time_end - $time_start;
        $now = date('Y-m-d H:i:s');
        $open = fopen("../../logs/sql.log", "a");
        fwrite($open, "[$now]: $username | $sql | $time \n");
        fclose($open);
        header("location:../edit-question.php?rp=0056&id=$mach");
    }
}
$conn->close();
// $mach = $_POST['mach'];
// $noidung = mysqli_real_escape_string($conn, $_POST['noidung']);
// $dapan = mysqli_real_escape_string($conn, $_POST['dapan']);

// if (isset($_GET['type'])) {
// $question_type = $_GET['type'];
// if ($question_type == "mc") {
// $opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
// $opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
// $opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
// $opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);


// $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question' AND question_id != '$question_id'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     while($row = $result->fetch_assoc()) {
//  header("location:../edit-question.php?rp=1185&id=$question_id");
//     }
// } else {

// $sql = "UPDATE tbl_questions SET question='$question', option1='$opt1', option2='$opt2', option3='$opt3', option4='$opt4', answer='$answer' WHERE question_id='$question_id'";

// if ($conn->query($sql) === TRUE) {
//     header("location:../edit-question.php?rp=7823&id=$question_id");
// } else {
//  header("location:../edit-question.php?rp=1298&id=$question_id");
// }

// }


// }else if($question_type == "fib") {

// $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question' AND question_id != '$question_id'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     while($row = $result->fetch_assoc()) {
//  header("location:../edit-question.php?rp=1185&id=$question_id");
//     }
// } else {

// $sql = "UPDATE tbl_questions SET question='$question', answer='$answer' WHERE question_id='$question_id'";

// if ($conn->query($sql) === TRUE) {
//     header("location:../edit-question.php?rp=7823&id=$question_id");
// } else {
//  header("location:../edit-question.php?rp=1298&id=$question_id");
// }


// }


// }else{
    
// }
    
// }else{
    

    
// }
