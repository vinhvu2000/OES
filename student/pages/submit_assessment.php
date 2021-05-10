<?php
include '../../database/config.php';
error_reporting(0);
$total_questions = $_POST['tq'];
$starting_mark = 1;
$mytotal_marks = 0;
$mabkt = $_POST['eid'];
$tgnop = $_POST['ri'];
$arr3=array();

// $sql1 = "SELECT dapan FROM cauhoi WHERE loaich = '3'";
// $result1 = $conn->query($sql1);
// if ($result1->num_rows > 0) {
//   while ($row = $result1->fetch_assoc()) {
//     $arr = explode('|',$row['dapan']);
//     foreach ($arr as $a)
//     {
//       $sql = "SELECT $a FROM cauhoi WHERE loaich = '3' AND mach = '$mach'";
//       $result = $conn->query($sql);
//       echo $sql;
//       if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//           array_push($arr3,"$row[$a]");
//         }
//       }
      
//     }
//   }
// } else {

// }
// echo print_r($arr3,true);

// while ($starting_mark <= $total_questions) { 

//    $starting_mark++;
//    }
session_start();

while ($starting_mark <= $total_questions) {
if ((base64_decode($_POST['ran'.$starting_mark.''])) == ($_POST['an'.$starting_mark.''])) {
$mytotal_marks = $mytotal_marks + 1;	
}

//echo $mytotal_marks.'<br>';

$mach = $_POST['mach'.$starting_mark.''];
$sql1 = "SELECT dapan FROM cauhoi WHERE loaich = '3'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
  while ($row = $result1->fetch_assoc()) {
    $arr = explode('|',$row['dapan']);
    foreach ($arr as $a)
    {
      $sql = "SELECT $a FROM cauhoi WHERE loaich = '3' AND mach = '$mach'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          array_push($arr3,"$row[$a]");
        }
      }      
    }
  }
}
$arr2 =($_POST['an'.$starting_mark.'']);
//echo print_r($arr2, true); echo '<br>';
$temp = count($arr2);
foreach ($arr2 as $b)
{
  if (in_array($b,$arr3)) {
    $mytotal_marks = $mytotal_marks + 1/$temp;	
  }
}
//echo $mytotal_marks; echo '<br>';
//echo print_r($arr3, true); echo '<br>';
// if () {
//   $mytotal_marks = $mytotal_marks + 1;	
// }




$starting_mark++;
}


$percent_score = ($mytotal_marks / $total_questions) * 100;
$percent_score = floor($percent_score);
$passmark = $_POST['pm'];

if ($percent_score >= $passmark) {
$trangthai = "1";	
}else{
$trangthai = "0";	
}

session_start();
$_SESSION['mabkt'] = $mabkt;
$masv = $_SESSION['user'];

$sql5 = "INSERT INTO diem (masv, mabkt, diem, trangthai, thoigian) VALUES ('$masv', '$mabkt', '$percent_score', '$trangthai', '$tgnop')";
echo $sql5;
if ($conn->query($sql5) === TRUE) {
  header("location:../assessment-info.php");
}
else
{
  //echo "<br>Lỗi!";
  //header("location:../take-assessment.php?id=$mabkt");
}
// $sql1 = "UPDATE diem SET diem='$percent_score', trangthai='$trangthai' WHERE mabkt='$mabkt'";

// if ($conn->query($sql1) === TRUE) {	
//    header("location:../assessment-info.php");
// } else {
//    header("location:../assessment-info.php");
// }

$conn->close();
?>
