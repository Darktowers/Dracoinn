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
			<header class="header">
				<div class="wrap center-block">
					<div class="contenedor">
						<figure class="logo left isotipo">
							<img src="../img/logo.png" alt="Usuario">
						</figure>
						<?php 
							$resul=mysql_query("SELECT * FROM usuario WHERE nickName='$usuario'");
							  if($row=mysql_fetch_array($resul))
							  {
										  do{
										
											
									
												$correoUsuario=stripslashes($row["correo"]);
												$telefonoUsuario=stripslashes($row["correo"]);
												$fotoUsuario=stripslashes($row["urlFotoUsuario"]);
										
										
										  }while($row=mysql_fetch_array($resul));
							  }

					 ?>	
						<div class="user right">
							<span class="notificaciones icon-eye eye-icon left" id="notificaciones"></span>
							<figure class="usuario round left">
								<img src="<?php echo"$fotoUsuario"; ?>" alt="Usuario" width="40" height="40">
							</figure>
							<span class="left username" id="usuarioD" value="<?php echo $usuario ?>"><?php echo $_SESSION['nick']; ?></span>		
							<div id="boton" class="menu icon-confi confi-icon left"></div>
						</div>

					</div>
				</div>
			</header>

			<section class="contenido wrap center-block relative">
				<nav id="menu"class="menu_nav left">
								<ul class="menu_ul">
									<li class="item"><a href="">Perfil</a></li>
									<li class="item"><a href="../includes/closeconexion.php">Cerrar Sesión</a></li>
								</ul>
							</nav>
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
					
					<form action="" type="POST" id="envioNotificacion">
					<div class="contenedorusuario">
						<div class='cartas right'>
							
						</div>
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
	<script src="js/ajaxBusqueda.js">
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