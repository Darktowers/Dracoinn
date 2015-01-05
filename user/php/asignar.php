<?php 
if($_POST)
{
	$tarjeta=$_POST['tarjeta'];
	$usuarioAsig=$_POST['usuarioAsig'];
	$usuarioP=$_POST['usuarioP'];
	$idAsig=$_POST['idAsig'];
	echo $tarjeta.$usuarioAsig.$usuarioP.$idAsig;
}
?>