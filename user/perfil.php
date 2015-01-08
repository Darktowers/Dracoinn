<?php
session_start();
@$busqueda=$_SESSION['usuarioBusqueda'];
@$usuario=$_SESSION['nick'];
include_once '../includes/conexion.php';

	if(@$_SESSION['usuario']==true && @$_SESSION['rol']=='Usuario')
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<title ><?php echo $usuario ?></title>
</head>
<body>
	<div class="back">
		<div class="fondo">
			
		</div>
		<div class="formu">
			<?php include_once 'includes/header.php' ?>
				<nav class="menu2_nav">
					<ul class="menu2_ul">
						<li class="menu2-item"><a href="index.php">Inicio</a></li>
						<li class="menu2-item"><a href="" class="active">Perfil</a></li>
						<li class="menu2-item"><a href="contrasena.php" >Cambiar Contraseña</a></li>
					</ul>
				</nav>
				<div class="contenidos">
					<br>
					<br>
					<h1>Perfil</h1>
					<br>
					<form action="php/cambioFoto.php" method="POST" id="formulario" enctype="multipart/form-data">
					<div class="imagen-actual" style="width: 150px; position: relative; display: inline-block;">
						<img src="<?php echo"$fotoUsuario"; ?>" alt="" width='150' height='150'>

						<input type="file" name="foto" style="width: 150px; height: 150px; border-radius: 50%; position: absolute; padding: 0px; right: 0px;top: 0px; opacity: 0;">
					</div>
					<div class="recuerdo"><h3>Haz Click para cambiar el avatar</h3></div>
					
					<div class="email">
						<span class="icon-location"></span>
						<input type="email" name="email" placeholder="E-mail" required autocomplete="off" value="<?php echo"$correoUsuario"; ?>" style="width: 240px;">
					</div>
					<div class="telefono">
						<span class="icon-envelope"></span>
						<input type="text" name="telefono" placeholder="Telefono" required autocomplete="off" value="<?php echo"$telefonoUsuario"; ?>">
					</div>
						<input type="hidden" id="usuario" name="usuario" value="<?=$usuario?>"/>
					
					<input type="submit" value="Cambiar datos" >
				</form>
				</div>
			</section>
		</div>	
	</div>
	<script src="../jquery/jquery-1.11.1.min.js">
	</script>
	<script src="js/js.js">
	</script>
	
	
	<div id="busque" class="busque"></div>	
</body>
</html>
<?php
echo $_SESSION['nick'].$_SESSION['rol'];
}
else
{
	header('location:../index.php');
}
?>