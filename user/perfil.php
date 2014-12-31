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
												$telefonoUsuario=stripslashes($row["telefono"]);
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
						<li class="menu2-item"><a href="index.php">Inicio</a></li>
						<li class="menu2-item"><a href="" class="active">Perfil</a></li>
						<li class="menu2-item"><a href="contrasena.php" >Cambiar Contraseña</a></li>
					</ul>
				</nav>
				<div class="contenidos">
					<br>
					<br>
					<h2>Perfil</h2>
					<br>
					<form action="" method="POST" id="formulario" enctype="multipart/form-data">
					<div class="imagen-actual" style="width: 150px; position: relative; display: inline-block;">
						<img src="<?php echo"$fotoUsuario"; ?>" alt="" width='150' height='150'>

						<input type="file" name="file" style="width: 150px; height: 150px; border-radius: 50%; position: absolute; padding: 0px; right: 0px;top: 0px; opacity: 0;">
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
					
					<input type="submit" value="Cambiar datos">
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