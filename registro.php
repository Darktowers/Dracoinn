<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<title>Dracoin - inicio</title>
</head>
<body>
	<div class="back">
		<div class="fondo">
			
		</div>
		<div class="formu">

			<div class="registro"style="top: 10%;">
				<h1>Registro</h1>
				<form action="" method="POST">
					<div class="usuario">
						<span class="icon-user"></span>
						<input type="text" name="user" placeholder="Usuario" required>
					</div>
					<div class="email">
						<span class="icon-location"></span>
						<input type="email" name="email" placeholder="E-mail" required>
					</div>
					<div class="telefono">
						<span class="icon-envelope"></span>
						<input type="text" name="telefono" placeholder="Telefono" required>
					</div>
					<div class="password">
						<span class="icon-key"></span>
						<input type="password" name="password" placeholder="Contraseña" required>
					</div>
					<div class="repassword">
						<span class="icon-key"></span>
						<input type="password" name="repassword" placeholder="Repetir Contraseña" required>
					</div>
					<input type="submit" value="Registrarse">
				</form>

				<a href="index.php"><span class="icon-envelope"></span>Cancelar</a>
				
			</div>
			
		</div>
		
	</div>	
</body>
</html>
<?php 
if($_POST){
	include_once'includes/conexion.php';
	$user=$_POST['user'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];

	if($password==$repassword){
		$queryNickName=mysql_query("select nickName from usuario where nickName='".$user."'");
		$queryCorreo=mysql_query("select correo from usuario where correo='".$email."'");
		$confirmacionNickName=mysql_num_rows($queryNickName);
		$confirmacionCorreo=mysql_num_rows($queryCorreo);
		
		if($confirmacionNickName==0 && $confirmacionCorreo==0){	
			$codPassword=sha1($password);
				$consulta=mysql_query("insert into usuario values ('".$user."','".$email."','".$codPassword."','".$telefono."','Activo','Usuario','defauld')");
				
				if($consulta){
					header('location:index.php');
				}
				else{echo "No existe";}
		}
		else{echo "repetido";}
	}
}
?>