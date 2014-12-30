<style>
	
div.highlight {
    display: none;
	position: absolute;
	background: rgba(76, 69, 69, 0.86);
	z-index: 103;
	width: 150px;
	height: 200px;
	top: 0;
	right: 0;
	z-index: 0;
}
div.carta-item input:checked ~ div.highlight {
	display: inline-block;
    background-color: rgba(59, 4, 118, 0.52);
}
</style>
<?php 
session_start(); 
	if($_POST)
	{
		$letra =$_POST['buscar'];
		
		$tarjetas= array("10","11","12","13","14");
		$tarjetasvalidas= array("0","0","0","0","0");




		if ($letra != "")
		{
			include_once '../../includes/conexion.php';
		$resul=mysql_query("SELECT * FROM usuario WHERE nickName='$letra'");
							  if($row=mysql_fetch_array($resul))
							  {
										  do{
										
											
									
												$correoBusqueda=stripslashes($row["correo"]);
												$telefonoBusqueda=stripslashes($row["telefono"]);
												$fotoBusqueda=stripslashes($row["urlFotoUsuario"]);


											echo"
												<div class='avatar'>
														<h3> $letra </h3>
														<figure class='img-avatar round'>
															<img src='$fotoBusqueda' alt='user' width='150' height='150'>
														</figure>
														<h4>$correoBusqueda</h4>
														<h4>+$telefonoBusqueda</h4>

													</div>";
													$cont=0;
													$resul1=mysql_query("SELECT * FROM asignaciones WHERE fkUsuPropietario='$letra'");
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
																													  		$imgTarjeta=stripslashes($row2["urlImgTarjeta"]);
																													  		
																													  		echo"
																																	<div class='carta-item' id='active'>
																																	<input type='radio' class='' value='".$tarjetasvalidas[$i]."' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
																																		<figure>
																																			<img src='$imgTarjeta' alt='' value='".$tarjetasvalidas[$i]."' class='contadorClick' width='150' height='200'>
																																			
																																		</figure>
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
																													  		
																													  		echo"
																																	<div class='carta-item' id='inactive'>
																																		<figure>
																																			<img src='$imgTarjeta' alt='' width='150' height='200'>
																																		</figure>
																																		<div class='inactive'></div>
																																	</div>
																																	
																																";

																						 								}while($row3=mysql_fetch_array($resul3));
																						 					}	
										 									}

										 							}	
										 					echo"<div class='comprar round' id='comprar'><img src='img/cart.png' alt=''></div> ";			
										 					}
										 					else{
										 						echo"<h1>Usuario sin tarjetas asignadas</h1>";
										 					}			
										
										  }while($row=mysql_fetch_array($resul));
							  }
			
		}	
	}

?>
<script>
		$("#comprar").click(function() {
			var lol = $("input:checked").val();
			alert(lol);
		});
												
									</script>