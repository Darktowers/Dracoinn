<?php 
if($_POST)
	{
		include_once '../../includes/conexion.php';
        $usuario=$_POST['usuario'];
    	$consulta=mysql_query("select * from notificaciones where fkUsuarioRemitente =_utf8'".$usuario."' and fkEstadoNotificacion = '111' LIMIT 5 collate utf8_bin");

    	for($i=0;$i=$resultado=mysql_fetch_array($consulta);$i++)
				{
					$consultaTarjeta=mysql_query("select nombreTarjeta from tarjetas where idTarjeta='".$resultado['fkIdTarjeta']."'");
					$resultadoTarjeta=mysql_fetch_array($consultaTarjeta);
					echo "<li class='notifInclu' value='".$resultado['idNotificacion']."'>".$resultado['fkUsuarioDestinatario']." te a solicita la tarjeta ".$resultadoTarjeta['nombreTarjeta']."</li>";
				}

	}	
?>