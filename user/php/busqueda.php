<?php

	if($_POST)
	{
		$letra =$_POST['buscar'];
		if ($letra != " ")
		{
			include_once '../../includes/conexion.php';
			$consulta="select nickName from usuario where nickName like '".$letra."%' limit 5";
			$query=mysql_query($consulta,$conexion);
			
				for($i=0;$i=$resultado=mysql_fetch_array($query);$i++)
				{
					echo "<li class='resultados' value='".$resultado['nickName']."'>".$resultado['nickName']."</li>";
				}		
		}	
	}

?>