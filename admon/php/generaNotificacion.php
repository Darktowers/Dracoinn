<?php 
if($_POST)
{
	include_once '../../includes/conexion.php';
	$usuarioD=$_POST['usuarioD'];
	$usuarioR=$_POST['usuarioR'];
	$valorC=$_POST['valorC'];
	$dia=date("j");
	$mes=date("n");
	$anio=date("Y");
	$danio=date("z");

	$consulta=mysql_query("insert into notificaciones values ('','".$usuarioD."','".$usuarioR."','".$valorC."','".$anio."-".$mes."-".$dia."','".$danio."','111');");
	if($consulta){echo "true";}else{echo "false";} 
	
}
?>