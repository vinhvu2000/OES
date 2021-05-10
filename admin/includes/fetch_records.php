<?php
include '../database/config.php';

$khoa = 0;
$sinhvien = 0;
$baikt = 0;
$monhoc = 0;
$loptc = 0;
$thongbao = 0;
$cauhoi = 0;
$sinhvien2 = 0;
$truot = 0;
$qua = 0;

$sql = "SELECT * FROM khoa";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $khoa++;
      }
  } else {
  }

$sql = "SELECT * FROM sinhvien";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sinhvien++;
    }
} else {
}


$sql = "SELECT * FROM baikt";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $baikt++;
    }
} else {
}

  $sql = "SELECT * FROM monhoc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $monhoc++;
    }
} else {
}

  $sql = "SELECT * FROM loptinchi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $loptc++;
    }
} else {
}


$sql = "SELECT * FROM thongbao";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $thongbao++;
    }
} else {
}

$sql = "SELECT * FROM cauhoi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cauhoi++;
    }
} else {
}

$sql = "SELECT * FROM sinhvien WHERE vaitro = 'student' AND trangthai = '0'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sinhvien2++;
    }
} else {
}

$sql = "SELECT * FROM diem";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $trangthai = $row['trangthai'];
        if ($trangthai == "PASS") {
            $qua++;
        } else {
            $truot++;
        }
    }
} else {
}



$conn->close();
