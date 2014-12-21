<?php 
	if($_POST)
	{
		$letra =$_POST['buscar'];
		if ($letra != " ")
		{
			include_once '../../includes/conexion.php';/*
			$consulta="select * from usuario where nickName regexp '^".$letra."'";
			$query=mysql_query($consulta,$conexion);
			
				for($i=0;$i=$resultado=mysql_fetch_array($query);$i++)
				{
					echo "<li class='resultados' value='".$resultado['nickName']."'>".$resultado['nickName']."</li>";
				}		*/
		}	
	}

?>