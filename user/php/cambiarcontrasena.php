<?php 

$actpassword=sha1($_POST['actpassword']);
$usuario=$_POST['usuario'];
$newpassword=$_POST['newpassword'];
$repassword=$_POST['repassword'];
include_once '../../includes/conexion.php';
$consulta=mysql_query("select nickName,passWord from usuario where nickName='".$usuario."' and passWord='".$actpassword."'");
$rows=mysql_num_rows($consulta);
if($rows==1){
	if ($newpassword == $repassword) {
		$passWord= sha1($newpassword);
		include_once '../../includes/conexion.php';
				
						$consulta="update usuario set passWord='".$passWord."' where nickName='".$usuario."'";
						$query=mysql_query($consulta,$conexion);
						if($query){
							?>
	<script> 
    	alert("Contaseña Cambiada Satisfactoriamente");
		document.location.href="../contrasena.php";
    </script> 
<?php
							}
							else{
								echo"<h1 style='color:red'>Error</h1>";
								}	
		
	}else
	{
?>
	<script> 
    	alert("Contaseñas no coinciden");
		document.location.href="../contrasena.php";
    </script> 
<?php

	}


}else{
	?>
	<script> 
    	alert("Contaseña Actual Incorrecta");
		document.location.href="../contrasena.php";
    </script> 
<?php
}

		

?>