<?php

include_once'conexion.php';	
if($_POST)	{
$correo=$_POST['user'];
$nuevacontraseña=rand(100000, 999999);
$nuevacontraseñacrip=sha1($nuevacontraseña);
	$cont=0;
$result1=mysql_query("SELECT * FROM usuario WHERE correo='$correo'");
	  if($row=mysql_fetch_array($result1))
	  {
				  do{
				  
					$cont++;
				
				
				  }while($row=mysql_fetch_array($result1));
	  }
	  if($cont==1){
		  mysql_query("UPDATE usuario SET passWord='$nuevacontraseñacrip' WHERE correo='$correo' ");

$para      = $correo;
$titulo = 'Restablecer contraseña';
$mensaje = "Tu contraseña es: ".$nuevacontraseña;
$cabeceras = 'From: dracon@outlook.es' . "\r\n" .
    'Reply-To: dracon@outlook.es' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
if(mail($para, $titulo, $mensaje, $cabeceras)){
		?>
		<script>
        alert("Hemos enviado las instrucciones de restablecimiento de contraseña a tu dirección de correo electrónico.                           Si no recibes las instrucciones dentro de pocos minutos, revisa el spam de tu correo electrónico y correo no deseado.");
		document.location.href="../index.php";
        </script>
		<?php
		}
	}
	
}
	
?>