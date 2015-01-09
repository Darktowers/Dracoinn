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
		$resul=mysql_query("SELECT * FROM usuario WHERE nickName=_utf8'$letra' collate utf8_bin");
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
														<div style='margin-bottom: 1em;''><span class='bloquear' id='bloquear'>bloquear</span></div> 

													</div>";
													$cont=0;
													$resul1=mysql_query("SELECT * FROM asignaciones WHERE fkUsuPropietario=_utf8'$letra'AND Estado='0' collate utf8_bin");
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
																													  	$resul3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$letra' and estado='1' and fkTarjeta='$tarjetasvalidas[$i]' collate utf8_bin");
																													  	$resu3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$letra' and estado='0' and fkTarjeta='$tarjetasvalidas[$i]' collate utf8_bin");
																													  	$cantidad2=mysql_num_rows($resul3);
																													  	$cantidad22=mysql_num_rows($resu3);
																													  	$resul31=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuPropietario=_utf8'$letra' and estado='1' and fkTarjeta='$tarjetasvalidas[$i]' collate utf8_bin");
																													  	$resu31=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuPropietario=_utf8'$letra' and estado='0' and fkTarjeta='$tarjetasvalidas[$i]' collate utf8_bin");
																													  	$cantidad21=mysql_num_rows($resul31);
																													  	$cantidad221=mysql_num_rows($resu31);
																													  	$totalvendidas =$cantidad2+$cantidad22;
																													  	$totalcompradas =$cantidad21+$cantidad221;
																													  	$mod=$totalvendidas%2;
																													  	$mod1=$totalcompradas%2;
																														if($mod==0)
																															{
																																$totalvendidas=$totalvendidas/2; 
																															}
																															elseif($mod==1)
																																{
																																	$totalvendidas=($totalvendidas+1)/2;
																																}
																																if($mod1==0)
																															{
																																$totalcompradas=$totalcompradas/2; 
																															}
																															elseif($mod1==1)
																																{
																																	$totalcompradas=($totalcompradas+1)/2;
																																}


																													  		$imgTarjeta=stripslashes($row2["urlImgTarjeta"]);
																													  		
																													  		echo"
																																	<div class='carta-item' id='active'>
																																	<input type='radio' class='' value='".$tarjetasvalidas[$i]."' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
																																		<figure>
																																			<img src='$imgTarjeta' alt='' value='".$tarjetasvalidas[$i]."' class='contadorClick' width='150' height='200'>
																																			
																																		</figure>
																																		<span class='contador round'  style='border: 3px solid #1AAB37;'>$totalcompradas</span>
																																		<span class='contador round'  style='border: 3px solid #2583FF;'>$totalvendidas</span>
																																		
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
																													  	$xresul3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$letra' and estado='1' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$xresu3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$letra' and estado='0' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$xcantidad2=mysql_num_rows($xresul3);
																													  	$xcantidad22=mysql_num_rows($xresu3);
																													  	$xresul31=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuPropietario=_utf8'$letra' and estado='1' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$xresu31=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuPropietario=_utf8'$letra' and estado='0' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$xcantidad21=mysql_num_rows($xresul31);
																													  	$xcantidad221=mysql_num_rows($xresu31);
																													  	$xtotalvendidas =$xcantidad2+$xcantidad22;
																													  	$xtotalcompradas =$xcantidad21+$xcantidad221;
																													  	$xmod=$totalvendidas%2;
																													  	$xmod1=$totalcompradas%2;
																														if($xmod==0)
																															{
																																$xtotalvendidas=$xtotalvendidas/2; 
																															}
																															elseif($mod==1)
																																{
																																	$xtotalvendidas=($xtotalvendidas+1)/2;
																																}
																																if($xmod1==0)
																															{
																																$xtotalcompradas=$xtotalcompradas/2; 
																															}
																															elseif($mod1==1)
																																{
																																	$xtotalcompradas=($xtotalcompradas+1)/2;
																																}


																													  		$imgTarjeta=stripslashes($row3["urlImgTarjeta"]);
																													  		
																													  		echo"
																																	<div class='carta-item' id='active'>
																																	<input type='radio' class='' value='".$tarjetas[$i]."' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
																																		<figure>
																																			<img src='$imgTarjeta' alt='' value='".$tarjetas[$i]."' class='contadorClick' width='150' height='200'>
																																			
																																		</figure>
																																		<span class='contador round'  style='border: 3px solid #1AAB37;'>$xtotalcompradas</span>
																																		<span class='contador round'  style='border: 3px solid #2583FF;'>$xtotalvendidas</span>
																																		
																																		<div class='inactive'></div>

																																	</div>
																																";
																													  	

																						 								}while($row3=mysql_fetch_array($resul3));
																						 					}	
										 									}

										 							}

										 					
										 					}
										 					else{
										 							echo"<h1>Usuario sin tarjetas asignadas</h1>";

																	for($i=0;$i<count($tarjetasvalidas);$i++)
										 							{	
										 						
										 								$resul3=mysql_query("SELECT * FROM tarjetas WHERE idTarjeta='$tarjetas[$i]'");
																										  if($row3=mysql_fetch_array($resul3))
																										  {
																													  do{
																													  	$zresul3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$letra' and estado='1' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$zresu3=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuAsignador=_utf8'$letra' and estado='0' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$zcantidad2=mysql_num_rows($zresul3);
																													  	$zcantidad22=mysql_num_rows($zresu3);
																													  	$zresul31=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuPropietario=_utf8'$letra' and estado='1' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$zresu31=mysql_query("SELECT * FROM asignaciones WHERE  fkUsuPropietario=_utf8'$letra' and estado='0' and fkTarjeta='$tarjetas[$i]' collate utf8_bin");
																													  	$zcantidad21=mysql_num_rows($zresul31);
																													  	$zcantidad221=mysql_num_rows($zresu31);
																													  	$ztotalvendidas =$zcantidad2+$zcantidad22;
																													  	$ztotalcompradas =$zcantidad21+$zcantidad221;
																													  	$zmod=$ztotalvendidas%2;
																													  	$zmod1=$ztotalcompradas%2;
																														if($zmod==0)
																															{
																																$ztotalvendidas=$ztotalvendidas/2; 
																															}
																															elseif($zmod==1)
																																{
																																	$ztotalvendidas=($ztotalvendidas+1)/2;
																																}
																																if($zmod1==0)
																															{
																																$ztotalcompradas=$ztotalcompradas/2; 
																															}
																															elseif($zmod1==1)
																																{
																																	$ztotalcompradas=($ztotalcompradas+1)/2;
																																}


																													  		$imgTarjeta=stripslashes($row3["urlImgTarjeta"]);
																													  		
																													  		echo"
																																	<div class='carta-item' id='active'>
																																	<input type='radio' class='' value='".$tarjetas[$i]."' name='cartasRadio' style='width: 150px; height: 200px; top: 0; position: absolute; right:0;z-index:1;opacity:0;'>
																																		<figure>
																																			<img src='$imgTarjeta' alt='' value='".$tarjetas[$i]."' class='contadorClick' width='150' height='200'>
																																			
																																		</figure>
																																		<span class='contador round'  style='border: 3px solid #1AAB37;'>$ztotalcompradas</span>
																																		<span class='contador round'  style='border: 3px solid #2583FF;'>$ztotalvendidas</span>
																																		
																																		<div class='inactive'></div>

																																	</div>
																																";

																						 								}while($row3=mysql_fetch_array($resul3));
																						 					}




																			}			 							
										 					}			
										
										  }while($row=mysql_fetch_array($resul));
							  }
			
		}	
	}

?>
