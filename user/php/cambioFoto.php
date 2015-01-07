<?php 

$tipo=$_FILES['foto']['type'];
$tamaño=$_FILES['foto']['size'];
$email=$_POST['email'];
$dia=date("j");
$mes=date("n");
$anio=date("Y");
$nombreArchivo=$dia.$mes.$anio.$email.$_FILES['foto']['name'];
$telefono=$_POST['telefono'];
$usuario=$_POST['usuario'];
if($tipo=='image/jpeg' || $tipo=='image/png' || $tipo=='image/jpg'){
	if($tamaño>=2000){
		$destinoReal="../img_user/";
		$destino="img_user/";
		$guardado=move_uploaded_file($_FILES['foto']['tmp_name'],$destinoReal.$nombreArchivo);
		include_once '../../includes/conexion.php';
		
				$consulta="update usuario set correo='".$email."', telefono='".$telefono."', urlFotoUsuario='".$destino.$nombreArchivo."' where nickName='".$usuario."'";
				$query=mysql_query($consulta,$conexion);
				if($query){
					header("location:../index.php");
					}
					else{
						echo"<h1 style='color:red'>Error</h1>";
						}	
		}
		else{?>
			<script> 
				alert("La imagen es muy pesada");
				document.location.href="../index.php";
			</script> 
		<?php }
}
else{?>
	<script> 
    	alert("Formato Incorrecto");
		document.location.href="../index.php";
    </script> 
<?php }
?>