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

			<div class="caja">
				<h1>Login</h1>
				<form action="" method="POST">
					<div class="usuario">
						<span class="icon-user"></span>
						<input type="text" name="user" placeholder="Usuario" required>
					</div>
					<div class="password">
						<span class="icon-key"></span>
						<input type="password" name="password" placeholder="Contraseña" required>
					</div>
					<input type="submit" value="Ingresar">
				</form>
				<a href="politicas.html"><span class="icon-star"></span>Registrarse</a>
				<a href="cambiarcontraseña.html"><span class="icon-lock"></span>Olvide mi contraseña</a>
				<div class="dragon"></div>
			</div>
			
		</div>
		
	</div>	
</body>
</html>
<?php 
if($_POST){
	include_once'includes/conexion.php';
	$user=$_POST['user'];
	$password=$_POST['password'];

	$consulta=mysql_query("select nickName,passWord from usuario where nickName='".$user."' and passWord='".$password."'");
	$rows=mysql_num_rows($consulta);
	if($rows==1){
		header('location:user/index.html');//pendiente poner location al el index de user
	}
	else{echo "No existe";}//pendiente poner parte de error en usuario
}
?>