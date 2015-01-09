<?php
session_start();
@$busqueda=$_SESSION['usuarioBusqueda'];
@$usuario=$_SESSION['nick'];
include_once '../includes/conexion.php';

	if(@$_SESSION['usuario']==true && @$_SESSION['rol']=='Administrador')
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
						<li class="menu2-item"><a href="perfil.php" >Perfil</a></li>
						<li class="menu2-item"><a href="" class="active">Cambiar Contraseña</a></li>
					
					</ul>
				</nav>
				<div class="contenidos">
					<br>
					<br>
					<h2>Cambiar Contraseña</h2>
					<br>
					
					<form action="" method="POST" id="formulario" enctype="multipart/form-data">
					
					<div class="actpassword">
						<span class="icon-user"></span>
						<input type="password" name="actpassword" placeholder="Contraseña Actual" required autocomplete="off">
					</div>
					<div class="password">
						<span class="icon-key"></span>
						<input type="password" name="newpassword" placeholder="Nueva Contraseña" required autocomplete="off">
					</div>
					<div class="repassword">
						<span class="icon-key"></span>
						<input type="password" name="repassword" placeholder="Repetir Contraseña" required autocomplete="off">
					</div>
					<input type="hidden" id="usuario" name="usuario" value="<?=$usuario?>"/>
					<input type="submit" value="Cambiar Contraseña">

				</form>

				</div>
				<div class="message" style="bottom:0;">
					<div class="cerrar icon-close" style="display:none"></div>
					<h3 id="mensaje"></h3>
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
<?php 
if($_POST){
	include_once'../includes/conexion.php';
	$user=$_POST['usuario'];
	$password=$_POST['actpassword'];
	$passwordnu=$_POST['newpassword'];
	$repassword=$_POST['repassword'];

	if($passwordnu==$repassword){
		$codPasswordact=sha1($password);
		$codPassword=sha1($passwordnu);
		$consulta=mysql_query("update usuario set passWord='".$codPassword."' where nickName='".$user."' and passWord='".$codPasswordact."' ",$conexion );
		
		if( $consulta ){
			?> <script>  
		   					$(function(){
		   						$("#mensaje").html("Se ha cambiado corretamente la Contraseña.");
								$(".message").show("slow");
								$(".cerrar").css("display","block")
								$(".cerrar").click(function(){
									$(".message").hide("slow");
								});

				});
		   		  </script><?php
		}else{?> <script>  
		   					$(function(){
		   						$("#mensaje").html("Algo salio mal valida los datos intenta de nuevo.");
								$(".message").show("slow");
								$(".cerrar").css("display","block")
								$(".cerrar").click(function(){
									$(".message").hide("slow");
								});

				});
		   		  </script><?php

		}



	}else{?> <script>  
		   					$(function(){
		   						$("#mensaje").html("Contraseñas no son iguales");
								$(".message").show("slow");
								$(".cerrar").css("display","block")
								$(".cerrar").click(function(){
									$(".message").hide("slow");
								});

				});
		   		  </script><?php

		}

}
?>