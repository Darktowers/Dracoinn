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
						<li class="menu2-item"><a href="" class="active">Inicio</a></li>
						<li class="menu2-item"><a href="inventario.php">Inventario</a></li>
						<li class="menu2-item"><a href="">Historial</a></li>
						<li class="menu2-item"><a href="">Soporte</a></li>
						<li class="menu2-item"><a href="">Politicas</a></li>
					</ul>
				</nav>
				<div class="contenido-cartas">
					<div id="buscador">
						<form action="" class="searching">
							<input id="search" type="text" autocomplete="off" name="search" placeholder="Buscar Usuario ..." class="search" />
							<div class="searchicon">
								<span class="icon-search search-icon"></span>
							</div>
						</form>
					</div>
					
					
					<div class="contenedorusuario">
						<div class='cartas right'>
							
						</div>
					</div>
					
				</div>
			</section>
		</div>	
	</div>
	<script src="../jquery/jquery-1.11.1.min.js">
	</script>
	<script src="js/js.js">
	</script>
	<script src="js/ajaxBusqueda.js">
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