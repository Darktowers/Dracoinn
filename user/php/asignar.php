<?php 
if($_POST)
{
	
	$tarjeta=$_POST['tarjeta'];
	$usuarioAsig=$_POST['usuarioAsig'];
	$usuarioP=$_POST['usuarioP'];
	$idAsig=$_POST['idAsig'];
	include_once '../../includes/conexion.php';
	$cont=0;
	$resul=mysql_query("SELECT * FROM `usuario` WHERE rolUsuario='Usuario' and `nickName`=_utf8 '$usuarioP' collate utf8_bin");
							  if($row=mysql_fetch_array($resul))
							  {
										  do{
										
												$cont++;

										
										}while($row=mysql_fetch_array($resul));
							  }

	if($cont==1){
      
		$restaAsigna=mysql_query("update asignaciones set Estado=1 where idAsignacion='".$idAsig."'");
		if($restaAsigna)
		{

		
			for ($i=0; $i < 2 ; $i++) { 
				$nuevaAsig=mysql_query("insert into asignaciones values('','".$usuarioAsig."','".$usuarioP."','".$tarjeta."','0')");

			}
		echo"Asignacion realizada Satisfactoriamente";
			
		}

	}else{
		echo"Usuario no existe";

	}
	
}
?>