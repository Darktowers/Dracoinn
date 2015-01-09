<?php 

$tipo=$_FILES['foto']['type'];
$tamaño=$_FILES['foto']['size'];
$email=$_POST['email'];
$dia=date("j");
$mes=date("n");
$anio=date("Y");
$usuario=$_POST['usuario'];
$nombreArchivo=$dia.$mes.$anio.$usuario.$_FILES['foto']['name'];
$telefono=$_POST['telefono'];

if(!empty($tipo)) {
if($tipo=='image/jpeg' || $tipo=='image/png' || $tipo=='image/jpg'){
	if($tamaño<=250000){
		$destinoReal="../../img_user/";
		$destino="img_user/";
		$guardado=move_uploaded_file($_FILES['foto']['tmp_name'],$destinoReal.$nombreArchivo);
		include_once '../../includes/conexion.php';
		$resul=mysql_query("SELECT * FROM `usuario` WHERE `nickName`=_utf8 '$usuario' collate utf8_bin");
							  if($row=mysql_fetch_array($resul))
							  {
										  do{
										
												
												$fotoBusqueda=stripslashes($row["urlFotoUsuario"]);

										
										}while($row=mysql_fetch_array($resul));
							  }	

     $fotoborrar = "../".$fotoBusqueda;

		$queryCorreoy=mysql_query("select correo from usuario where  correo='".$email."'");
		$queryCorreo=mysql_query("select * from usuario where nickName='".$usuario."' and correo='".$email."'");
	
		$confirmacionCorreo=mysql_num_rows($queryCorreo);
		$confirmacionCorreo2=mysql_num_rows($queryCorreoy);
		
		
		   if($confirmacionCorreo==1){

		   		

				unlink($fotoborrar);
				$consulta="update usuario set correo='".$email."', telefono='".$telefono."', urlFotoUsuario='../".$destino.$nombreArchivo."' where nickName=_utf8'".$usuario."' collate utf8_bin";
				$query=mysql_query($consulta,$conexion);
				if($query){
					header("location:../perfil.php");
					}
					else{
						echo"<h1 style='color:red'>Error</h1>";
						}	


					}elseif($confirmacionCorreo2 == 0 && $confirmacionCorreo == 0){

								

								unlink($fotoborrar);
								$consulta="update usuario set correo='".$email."', telefono='".$telefono."', urlFotoUsuario='../".$destino.$nombreArchivo."' where nickName=_utf8'".$usuario."' collate utf8_bin";
												$query=mysql_query($consulta,$conexion);
												if($query){
													header("location:../perfil.php");
													}
													else{
														echo"<h1 style='color:red'>Error</h1>";
														}	
					}
					else{
						

?>
			<script> 
				alert("El correo ya existe");
				document.location.href="../perfil.php";
			</script> 
		<?php
					}
				
		}
		else{

echo"$tamaño";
			?>
			<script> 
				alert("La imagen es muy pesada");
				document.location.href="../perfil.php";
			</script> 
		<?php }
}
else{?>
	<script> 
    	alert("Formato Incorrecto");
		document.location.href="../perfil.php";
    </script> 
<?php }
}
else{
include_once '../../includes/conexion.php';
			$queryCorreoy=mysql_query("select correo from usuario where  correo='".$email."'");
		$queryCorreo=mysql_query("select correo from usuario where nickName='".$usuario."' and correo='".$email."'");
	
		$confirmacionCorreo=mysql_num_rows($queryCorreo);
		$confirmacionCorreo2=mysql_num_rows($queryCorreoy);
		
		
		   if($confirmacionCorreo==1){


		
				$consulta="update usuario set correo='".$email."', telefono='".$telefono."' where nickName=_utf8'".$usuario."' collate utf8_bin";
				$query=mysql_query($consulta,$conexion);
				if($query){
					header("location:../perfil.php");
					}
					else{
						echo"<h1 style='color:red'>Error</h1>";
						}	


					}elseif($confirmacionCorreo2==0){
						
								$consulta="update usuario set correo='".$email."', telefono='".$telefono."' where nickName=_utf8'".$usuario."' collate utf8_bin";
												$query=mysql_query($consulta,$conexion);
												if($query){
													header("location:../perfil.php");
													}
													else{
														echo"<h1 style='color:red'>Error</h1>";
														}	
					}
					else{

?>
			<script> 
				alert("El correo ya existe");
				document.location.href="../perfil.php";
			</script> 
		<?php
					}
				
}
?>