<?php 
if($_POST)
{
	
	$tarjeta=$_POST['tarjeta'];
	$usuarioAsig=$_POST['usuarioAsig'];
	$usuarioP=$_POST['usuarioP'];

	include_once '../../includes/conexion.php';
	$cont=0;
	$resul=mysql_query("SELECT * FROM `usuario` WHERE `nickName`=_utf8 '$usuarioP' collate utf8_bin");
							  if($row=mysql_fetch_array($resul))
							  {
										  do{
										
												$cont++;
										
										}while($row=mysql_fetch_array($resul));
							  }

	if($cont==1){

		
			for ($i=0; $i < 2 ; $i++) { 
				$nuevaAsig=mysql_query("insert into asignaciones values('','".$usuarioAsig."','".$usuarioP."','".$tarjeta."','0')");

			}
			 echo"Asignada satisfactoriamente";
		
			
		
	}else{
		echo"Usuario no existe";

	}
	
}
?>