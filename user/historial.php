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
	<title ><?= $usuario ?></title>

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
						<li class="menu2-item"><a href="inventario.php" >Inventario</a></li>
						<li class="menu2-item"><a href="" class="active">Historial</a></li>
						<li class="menu2-item"><a href="soporte.php">Soporte</a></li>
						<li class="menu2-item"><a href="politicas.php">Politicas</a></li>
					</ul>
				</nav>
				<div class="contenido-cartas">
					
					
					
					<div class="contenedorusuario" style="display: block;margin: 0 auto;">
						<h1 style="
    /* padding-top: 1em; */
    position: absolute;
    display: block;
    width: 100%;
">Tarjetas Asignadas</h1>
						<div class='cartas right'style="
    padding-top: 12em;
">

							<?php
								include_once '../includes/conexion.php';



								$tarjetas= array("10","11","12","13","14");
								$tarjetasvalidas= array("0","0","0","0","0");
								$cont=0;
													$resul1=mysql_query("SELECT * FROM asignaciones WHERE fkUsuPropietario=_utf8'$usuario' and estado='1' collate utf8_bin");
													
														  if($row1=mysql_fetch_array($resul1))
														  {
																	  do{
																	  		$fkTarjeta=stripslashes($row1["fkTarjeta"]);
																	  			
																	  		$cont++;
																	  		
																	  		if($fkTarjeta=="10"){
																	  				$tarjetasvalidas[0]=$fkTarjeta;	
																	  		}elseif ($fkTarjeta=="11") {
																	  			$tarjetasvalidas[1]=$fkTarjeta;
																	  		}elseif ($fkTarjeta=="12") {
																	  			$tarjetasvalidas[2]=$fkTarjeta;
																	  		}elseif ($fkTarjeta=="13") {
																	  			$tarjetasvalidas[3]=$fkTarjeta;
																	  		}elseif ($fkTarjeta=="14") {
																	  			$tarjetasvalidas[4]=$fkTarjeta;
																	  		}	


													
										 								}while($row1=mysql_fetch_array($resul1));
										 					}
										 					if($cont>0){
										 						
										 							/*for($i=0;$i<count($tarjetasvalidas);$i++)
										 							{	
										 									echo"<h2>$tarjetasvalidas[$i]</h2>";

										 							}*/
										 							
										 							
										 						for($i=0;$i<count($tarjetasvalidas);$i++)
										 							{	
										 									if($tarjetasvalidas[$i] != "0"){
										 										
										 										
										 												$resul2=mysql_query("SELECT * FROM tarjetas WHERE idTarjeta='$tarjetasvalidas[$i]'");
																										  if($row2=mysql_fetch_array($resul2))
																										  {
																													  do{
																													  	$resul3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$usuario' and estado='1' and fkTarjeta='$tarjetasvalidas[$i]' collate utf8_bin");
																													  	$resu3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$usuario' and estado='0' and fkTarjeta='$tarjetasvalidas[$i]' collate utf8_bin");
																													  	$cantidad2=mysql_num_rows($resul3);
																													  	$cantidad22=mysql_num_rows($resu3);
																													  	$totalcompradas =$cantidad2+$cantidad22;
																													  	$mod=$totalcompradas%2;
																														if($mod==0)
																															{
																																$totalcompradas=$totalcompradas/2; 
																															}
																															elseif($mod==1)
																																{
																																	$totalcompradas=($totalcompradas+1)/2;
																																}
																													  	$idAsig=mysql_fetch_array($resul1);
																														
													
																													  		$imgTarjeta=stripslashes($row2["urlImgTarjeta"]);
																													  		
																													  		echo"
																																	<div class='carta-item' id='active'>
																																	<input type='radio'  alt='".$idAsig['idAsignacion']."' class='cartasActivas ' value='".$imgTarjeta."' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
																																		<figure id='mod' >
																																			<img src='$imgTarjeta' alt='' value='".$tarjetasvalidas[$i]."' class='contadorClick valueCarta' width='150' height='200'>
																																			
																																		</figure>
																																		<span class='contador round'>$totalcompradas</span>
																																		<div class='highlight'></div>

																																	</div>
																																";

																						 								}while($row2=mysql_fetch_array($resul2));
																						 					}



										 									}else
										 									{
										 											$resul3=mysql_query("SELECT * FROM tarjetas WHERE idTarjeta='$tarjetas[$i]'");
																										  if($row3=mysql_fetch_array($resul3))
																										  {
																													  do{
																													  	
																													  		
																													  	$imgTarjeta=stripslashes($row3["urlImgTarjeta"]);
																													  	$resul5=mysql_query("SELECT * FROM asignaciones WHERE fkUsuAsignador=_utf8'$usuario' and Estado='0' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$cantidad=mysql_num_rows($resul5);
																													  	$resul4=mysql_query("SELECT * FROM asignaciones WHERE fkUsuAsignador=_utf8'$usuario' and Estado='1' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$cantidad2=mysql_num_rows($resul4);
																													  		echo"
																																	<div class='carta-item' id='inactive'>
																																		<figure>
																																			<img src='$imgTarjeta' alt='' width='150' height='200'>
																																		</figure>
																																		<span class='contador round'>$cantidad2</span>
																																		
																																		<div class='inactive'></div>
																																	</div>
																																	
																																";
																						 								}while($row3=mysql_fetch_array($resul3));
																						 					}	
										 									}

										 							}	
										 						
										 					}
							?>
						</div>
						<div class="cartas" id="contenedorAsigna"style="top: 244px;position: absolute; display:none;padding-top: 12em;" >
							<div class='carta-item' id='cartas1'>
							<input type='radio' class='' value='".$tarjetasvalidas[$i]."' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
								<figure>
									<img src=''  alt='' value='".$tarjetasvalidas[$i]."' class='contadorClick imagenUrl' width='150' height='200'>
									
								</figure>
								<form action="">
								<input type="text" id="carta1" name="carta1" style="width: 93px;">
								<button id="enviar1">Asignar</button>
								<div class='highlight'></div>
								</form>
	
							</div>
							<div class='carta-item' id='cartas2'>
							<input type='radio' class='' value='<?=$tarjetasvalidas[$i]?>' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
								<figure>
									<img src='' alt='' value='".$tarjetasvalidas[$i]."' class='contadorClick imagenUrl' width='150' height='200'>
									
								</figure>
								<form action="">
								<input type="text" id="carta2" name="carta2" style="width: 93px;">
								<button id="enviar2">Asignar</button>
								<div class='highlight'></div>
								</form>
							
							</div>
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