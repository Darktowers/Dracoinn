<?php 
	$self = $_SERVER['PHP_SELF'];
	header("refresh:600; url=$self");

	include_once '../includes/conexion.php';
            
    $consulta=mysql_query("select idNotificacion from notificaciones where fkUsuarioRemitente = '".$usuario."' and fkEstadoNotificacion = '111' ");
    
    $num=mysql_num_rows($consulta);
    echo $num;

?>