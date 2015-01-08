$(function (){
	
	$(".cartasActivas").click(function()
	{	
		var urlCarta = $(this).val();
		var valorCarta = $("input:checked").val();			
		if(valorCarta){
			$("#contenedorAsigna").css("display","block");
			$(".imagenUrl").attr("src",""+urlCarta+"");
			var idAsig= $(this).attr("alt");
			var mo= $(this).attr("id");
			var tarjeta= $(this).attr("rel");
			//alert(idAsig);
			if(mo==1){
				$("#cartas1").css("display","none");
			}else{
			$("#cartas1").css("display","inline-block");
			}

			

		}		
				
	});

	$("#enviar1").click(function(){
				var usuario=$("#usuarioD").attr("value");
				
				var usuarioP=$("#carta1").val();
				
				if(usuarioP!="" && usuarioP != usuario){
					
				var confirmar=confirm("Desea Asignar la carta a el usuario "+usuarioP);
				if(confirmar){
					alert(tarjeta);
				
					$.ajax({
						type:"POST",
						url:"php/asignar.php",
						data:{ tarjeta: tarjeta, usuarioAsig:usuario, usuarioP : usuarioP , idAsig :idAsig} ,
						success:function(data){
							
							document.location.reload();
						}
					});
				}
				else{
					alert("Ha cancelado la Asignacion.")
					document.location.reload();	
					}

				}else{
					alert("No ha seleccionado ningun usuario para asignar la tarjeta o estas intentando asignarte a ti mismo.");
				
					}
				
			});

			$("#enviar2").click(function(){


				var usuario=$("#usuarioD").attr("value");
				
				var usuarioP=$("#carta2").val();
				

				if(usuarioP!="" && usuarioP != usuario){
					alert(usuarioP+usuario);
				var confirmar=confirm("Desea Asignar la carta a el usuario "+usuarioP);
				if(confirmar){
					alert(tarjeta);
				
					$.ajax({
						type:"POST",
						url:"php/asignar.php",
						data:{ tarjeta: tarjeta, usuarioAsig:usuario, usuarioP : usuarioP , idAsig :idAsig} ,
						success:function(data){
							
							document.location.reload();
						}
					});
				}
				else{
					alert("Ha cancelado la Asignacion.")
					document.location.reload();	
					}

				}else{
					alert("No ha seleccionado ningun usuario para asignar la tarjeta o estas intentando asignarte a ti mismo.");
				
					}

			});
}); 
