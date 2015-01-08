<?php
session_start();
if(@$_SESSION['usuario']!=true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<title>Dracoin - inicio</title>
</head>
<body>
	<div class="back">
		<div class="fondo">
			
		</div>
		<div class="formu">
		
			<div class="caja">
				<div class="message">
					<div class="cerrar icon-close"></div>
					<h3>Error en usuario o contraseña</h3>
				</div>
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
	<script src="jquery/jquery-1.11.1.min.js">
	    </script>
</body>
</html>
<?php 

if($_POST)
{
	include_once'includes/conexion.php';
	$userSinFiltro=$_POST['user'];
	$user=filter_var($userSinFiltro,FILTER_SANITIZE_MAGIC_QUOTES);
	$password=sha1($_POST['password']);

	$consulta=mysql_query("select nickName,passWord,rolUsuario from usuario where nickName='".$user."' and passWord='".$password."'");
	$rows=mysql_num_rows($consulta);
	$fetch=mysql_fetch_array($consulta);
	if($rows==1 && $fetch['rolUsuario']=="Usuario")
		{
			$_SESSION['usuario']=true;
			$_SESSION['rol']=$fetch['rolUsuario'];
			$_SESSION['nick']=$fetch['nickName'];
			header('location:user/index.php');
		}
	
	elseif($rows==1 && $fetch['rolUsuario']=="Administrador"){
		    $_SESSION['usuario']=true;
			$_SESSION['rol']=$fetch['rolUsuario'];
			$_SESSION['nick']=$fetch['nickName'];
			header('location:admon/index.php');
		}else{
		?>
		
			<script type="text/javascript">
				//Christian meter ligthbox con texto de error de contraseña o nickname 
				$(function(){
					$(".message").show("slow");
					$(".cerrar").click(function(){
						$(".message").hide("slow");
					});

				});
			</script>
		<?php
	}
}
}
else
{
	if(@$_SESSION['rol']=='Usuario')
	{
		header('location:user/index.php');
	}elseif(@$_SESSION['rol']=='Administrador')
	{
		header('location:admon/index.php');
	}
}
?>