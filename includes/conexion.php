<?php
	$conexion=mysql_connect("localhost","root","");
	if(!$conexion){
		echo "Error al en el servidor";
		}
		else{
			$db=mysql_select_db("dragoin");
			mysql_query("SET NAMES 'utf8'");
			if(!$db){
				echo "Error en la BD";
				}
			}
	
?>