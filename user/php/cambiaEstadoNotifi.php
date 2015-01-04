<?php 
if($_POST)
	{
		include_once '../../includes/conexion.php';
        $idNotifi=$_POST['idNofi'];
    	$consulta=mysql_query("update notificaciones set fkEstadoNotificacion='222' where idNotificacion='".$idNotifi."'");
    	if($consulta){echo "true";}else{echo "false";}
	}	
?>