<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$_SESSION['ten']='Admin';
	$ten = $_SESSION['ten'];
	$vaitro = $_SESSION['vaitro'];
	if ($vaitro == "admin") {
	}else{
	header("location:../?rp=0003");	
	}
}else{
	header("location:../?rp=0004");
}

?>