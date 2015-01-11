<?php
include_once '../../includes/conexion.php';if($_POST)	{
$usuario=$_POST['usuario'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$para  = 'dracoincorp@gmail.com';
$titulo = 'Correo soporte de: '.$usuario.' con el asunto: '.$asunto;
$cabeceras = 'From: soporte@dracon.es' . "\r\n" .
    'Reply-To: soporte@dracon.es' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($para, $titulo, $mensaje, $cabeceras)){
		?>
		<script>
        alert("Hemos enviado tu mensaje.");
		document.location.href="../index.php";
        </script>
		<?php
		}
	
}
	
?>