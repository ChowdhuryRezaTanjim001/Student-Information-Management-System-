<?php
	session_start();
	require_once("function.php");
	$user = new dbms();
	$user->logout();
	header("Location:alogin.php");
?>