<?php
session_start();
	$_SESSION['usuario']=false;
	$_SESSION['rol']=false;
	$_SESSION['nick']=false;
session_destroy();
header("location:../index.php");
?>