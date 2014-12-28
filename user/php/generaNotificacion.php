<?php 
if($_POST)
{
	$usuarioD=$_POST['usuarioD'];
	$usuarioR=$_POST['usuarioR'];
	$valorC=$_POST['valorC'];

	echo $usuarioR.$usuarioD.$valorC;
}
?>