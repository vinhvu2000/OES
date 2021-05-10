<?php
session_start();
$username = $_SESSION['user'];
$now = date('Y-m-d H:i:s');
$open = fopen("../logs/log.log", "a");
fwrite($open, "[$now]: $username đăng xuất\n");
fclose($open);
$_SESSION['login'] = false;
session_destroy();
header("location:../");

?>