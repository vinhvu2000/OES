<?php
/*
include '../database/config.php';
//include '../take-assessment.php';
session_start();
$masv = $_SESSION['user'];
$students_in_my_class = 0;
$active_examinations = 0;
$my_subjects = 0;
$passed_exam = 0;
$failed_exam = 0;
$attended_exams = 0;
$locked_exams = 0;
$notice = 0;
//so bai kt da lam
$sql = "SELECT * FROM diem WHERE masv = '$masv' GROUP BY mabkt";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $attended_exams++;
    }
} else {
}
//thong ke so bai kt pass

$sql1 = "SELECT COUNT(thoigian) AS solan FROM diem WHERE masv = '$masv' AND mabkt = '$mabkt'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0)
    {
        while ($row = $result1->fetch_assoc())
        {
            $solan = $row['solan'];
            session_start();
            $_SESSION['solan'] = $solan;
        }
    }
    
$sql = "SELECT * FROM diem INNER JOIN baikt ON diem.mabkt = baikt.mabkt WHERE masv ='$masv'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $cachtinh = $row['cachtinh'];
        
        $diemtoithieu = $row['diemtoithieu'];
        if ($cachtinh=="caonhat") {
            $sql1 = "SELECT * FROM diem WHERE masv = '$masv' AND diem = (SELECT MAX(diem) FROM diem WHERE masv = '$masv') GROUP BY mabkt";
            $result1 = $conn->query($sql1);
            while ($row1 = $result1->fetch_assoc()) {
                $diem = $row['diem'];
            }
            if($diem >= $diemtoithieu)
            {
            $passed_exam++;
            }
        }
        else
        {
            //echo $diem;
            $diem +=$diem;
            $diem = $diem/$solan;
            if($diem >= $diemtoithieu)
            {
            $passed_exam++;
            }
        }
        
        
    }
} else {
}
//thong ke so bai kt khong pass

        $failed_exam = $attended_exams - $passed_exam;
   
//thong ke mon hoc
$sql = "SELECT * FROM dangki WHERE masv = '$masv'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $my_subjects++;
    }
} else {
}

//so bai kt da lam



// $sql = "SELECT * FROM tbl_examinations WHERE category = '$mycategory' AND status = 'Inactive'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     while ($row = $result->fetch_assoc()) {
//         $locked_exams++;
//     }
// } else {
// }

// $sql = "SELECT * FROM thongbao INNER JOIN diem ON thongbao.mamh =";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     while ($row = $result->fetch_assoc()) {
//         $notice++;
//     }
// } else {
// }
$conn->close();
*/