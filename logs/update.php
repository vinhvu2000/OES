<?php
include '../database/config.php';
$fp = fopen("sql.log", "r");
 
while (! feof($fp)) {
    $line = fgets($fp);
    $thoigian = substr($line, 1, 19);
    $another = substr($line, 23, strlen($line)-1);
    $array = explode(" | ", $another);
    $user = $array[0];
    $query = addslashes($array[1]);
    $time = $array[2];
    $sql = "INSERT INTO sql_log(thoigian,user,query,time) VALUES ('$thoigian','$user','$query','$time'); ";
    if ($conn->query($sql) === true) {
        echo "$thoigian | $user | $query | $time ".'SUCCESS<br>';
    } else {
        echo "$thoigian | $user | $query | $time ".'FAIL<br>';
    }
}

fclose($fp);
$conn->close();
