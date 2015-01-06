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
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
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
						<li class="menu2-item"><a href="soporte.php">Soporte</a></li>
						<li class="menu2-item"><a href=""class="active">Politicas</a></li>
					</ul>
				</nav>
				<div class="contenidos">
					<br>
					<br>
					<h2>LEA ATENTAMENTE LAS POLITICAS DE USO DE ESTE SITIO

</h2>
					<br>
					<div class="mensaje">
						
						<textarea name="politicas" id="" cols="40" rows="10" style="
    width: 40%;height:450px;
" disabled>Los servicios que Dracoin proporciona al usuario están sujetos a los siguientes términos de uso. Dracoin se reserva el derecho a actualizar los términos de uso en cualquier momento y sin previo aviso al usuario. Ingresando a su usuario, puede revisar la versión más actual de los términos de uso.

1. El derecho a utilizar Dracoin, es personal del usuario y no puede transferirse a ninguna otra persona o entidad. El usuario es responsable de todo uso de la cuenta del mismo y de asegurarse que todo uso de la cuenta del usuario cumple íntegramente con las disposiciones de este acuerdo. El usuario será responsable de proteger la confidencialidad de las contraseñas.
2. Dracoin tendrá derecho en cualquier momento a cambiar o suspender cualquier aspecto o característica de la página. 
3. El usuario no deberá publicar ni transmitir a través de Dracoin, ningún material ningún material que viole o transgreda de alguna manera los derechos de otras personas, que sea ilegal, amenazador, difamatorio que invada los derechos a la privacidad o publicidad
4.  El usuario también elegirá una contraseña y un nombre de usuario. Este es totalmente responsable de conservar la confidencialidad de su cuenta y contraseña. Además, el usuario es completamente responsable de todas y cada una de las actividades que se llevan a cabo a través de su cuenta. El usuario acepta notificar inmediatamente a Dracoin, sobre cualquier uso no autorizado de su cuenta o de cualquier otro peligro contra la seguridad. Dracoin no será responsable de ninguna pérdida en la que pudiera incurrir el usuario como resultado de que otra persona utilice su cuenta o contraseña, con o sin  su conocimiento.
5. El usuario es el único responsable de manejar cada una de sus tarjetas y asignarlas. Cada usuario da libre uso a cada una de ellas y es el único que puede asignarlas a otros usuarios,  Dracoin no se hace responsable de recaudar dinero ni de ser intermediario para estas asignaciones.



						
						</textarea>
						
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