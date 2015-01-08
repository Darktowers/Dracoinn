<?php 
if($_POST)
{
	echo("mamada");
	$tarjeta=$_POST['tarjeta'];
	$usuarioAsig=$_POST['usuarioAsig'];
	$usuarioP=$_POST['usuarioP'];
		echo($tarjeta);
	include_once '../../includes/conexion.php';


		for ($i=0; $i < 2 ; $i++) { 
			$nuevaAsig=mysql_query("insert into asignaciones values('','".$usuarioAsig."','".$usuarioP."','".$tarjeta."','0')");

		}
	
}
?>