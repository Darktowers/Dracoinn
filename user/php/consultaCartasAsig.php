<?php 
session_start(); 
	if($_POST)
	{
		$letra =$_POST['buscar'];
		echo"$letra";
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

													</div>
													<div class='cartas right'>
														<div class='carta-item'>
															<figure>
																<img src='Tarjetas/draegg.png' alt='' width='150' height='200'>
															</figure>
														</div>
														<div class='carta-item'>
															<figure>
																<img src='Tarjetas/draegg.png' alt='' width='150' height='200'>
															</figure>
														</div>
														<div class='carta-item'>
															<figure>
																<img src='Tarjetas/draegg.png' alt='' width='150' height='200'>
															</figure>
														</div>
														<div class='carta-item'>
															<figure>
																<img src='Tarjetas/draegg.png' alt='' width='150' height='200'>
															</figure>
														</div>
														<div class='carta-item'>
															<figure>
																<img src='Tarjetas/draegg.png' alt='' width='150' height='200'>
															</figure>
														</div>
														<div class='comprar round'><img src='img/cart.png' alt=''></div>
													</div> ";
										
										
										  }while($row=mysql_fetch_array($resul));
							  }
			
		}	
	}

?>