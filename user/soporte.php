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
						<li class="menu2-item"><a href="index.php" >Inicio</a></li>
						<li class="menu2-item"><a href="inventario.php">Inventario</a></li>
						<li class="menu2-item"><a href="historial.php">Historial</a></li>
						<li class="menu2-item"><a href=""class="active">Soporte</a></li>
						<li class="menu2-item"><a href="politicas.php">Politicas</a></li>
					</ul>
				</nav>
				<div class="contenidos">
					<br>
					<br>
					<h2>INDIQUENOS SUS INQUIETUDES<br>
RECLAMOS O SUGERENCIAS AQUÍ!
</h2>
					<br>
					<form action="php/correoSoporte.php" method="POST" id="formulario" enctype="multipart/form-data">
						
					
					<div class="usuario">
						<span class="icon-envelope"></span>
						<input type="hidden" id="usuario" name="usuario" value="<?=$usuario?>"/>
						<input type="text" name="" placeholder="Usuario" value="<?php echo"$usuario"; ?>"  required autocomplete="off"  disabled>
					</div>
					<div class="asunto">
						<span class="icon-location"></span>
						<input type="text" name="asunto" placeholder="Asunto" required autocomplete="off" style="width: 240px;">
					</div>
					<div class="mensaje">
						<textarea name="mensaje" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
						
					</div>
					<div class="input">
						
							<input type="submit" value="Enviar" action="">
					</div>
				</form>
				</div>
			</section>
		</div>	
	</div>
	<script src="../jquery/jquery-1.11.1.min.js">
	</script>
	<script src="js/js.js">
	</script>
	
	<script src="js/incluNotifi.js">
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