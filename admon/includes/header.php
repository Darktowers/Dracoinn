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
							<span id="botonnoti"class="notificaciones icon-eye eye-icon left" ><?php include_once 'php/numeroNotificacion.php'; ?></span>
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
			<div id="notificaciones" class="contenedornotificaciones">
				<nav class="notificaciones">
					<ul class="notificacion" id="incluNotifi">
						
					</ul>
				</nav>
			</div>
				<nav id="menu"class="menu_nav left">
								<ul class="menu_ul">
									<li class="item"><a href="perfil.php">Perfil</a></li>
									<li class="item"><a href="../includes/closeconexion.php">Cerrar Sesión</a></li>
								</ul>
							</nav>