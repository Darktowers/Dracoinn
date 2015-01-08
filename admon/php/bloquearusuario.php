<?php 
$usarioAdm=$_POST['usuarioD'];
$usuarioBloq=$_POST['usuarioR'];


include_once '../../includes/conexion.php';
		
				$consulta="update usuario set rolUsuario='Bloqueado' where nickName='".$usuarioBloq."'";
				$query=mysql_query($consulta,$conexion);
				if($query){
					header("location:../soporte.php");
					}
					else{
						echo"<h1 style='color:red'>Error</h1>";
						}	

?>