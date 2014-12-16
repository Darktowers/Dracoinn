<?php
session_start();
	if(@$_SESSION['usuario']==true && @$_SESSION['rol']=='Usuario')
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<title>Home</title>
</head>
<body>
	<div class="back">
		<div class="fondo">
			
		</div>
		<div class="formu">
			<header class="header">
				<div class="wrap center-block">
					<div class="contenedor">
						<figure class="logo left isotipo">
							<img src="../img/logo.png" alt="Usuario" width="40" height="40">
						</figure>
						<div class="user right">
							<span class="notificaciones icon-eye eye-icon left" id="notificaciones"></span>
							<figure class="usuario round left">
								<img src="img_user/user.jpg" alt="Usuario" width="40" height="40">
							</figure>
							<span class="left username"><?php echo $_SESSION['nick']; ?></span>		
							<div id="boton" class="menu icon-confi confi-icon left"></div>
						</div>

					</div>
				</div>
			</header>

			<section class="contenido wrap center-block relative">
				<nav id="menu"class="menu_nav">
								<ul class="menu_ul">
									<li class="item"><a href="">Perfil</a></li>
									<li class="item"><a href="../includes/closeconexion.php">Cerrar Sesión</a></li>
								</ul>
							</nav>
				<nav class="menu2_nav">
					<ul class="menu2_ul">
						<li class="menu2-item"><a href="" class="active">Inicio</a></li>
						<li class="menu2-item"><a href="">Inventario</a></li>
						<li class="menu2-item"><a href="">Soporte</a></li>
						<li class="menu2-item"><a href="">Politicas</a></li>
						<li class="menu2-item"><a href="">Otra</a></li>
					</ul>
				</nav>			
			</section>
		</div>	
	</div>
	<script src="../jquery/jquery-1.11.1.min.js">
	</script>
	<script src="js/js.js">
	</script>	
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