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
			//alert(idAsig);
			if(mo==1){
				$("#cartas1").css("display","none");
			}else{
			$("#cartas1").css("display","inline-block");
			}

			$("#enviar1").click(function(){
				var usuario=$("#usuarioD").attr("value");
				var tarjeta=$(".valueCarta").attr("value");
				var usuarioP=$("#carta1").val();

				if(usuarioP!=""){
				
					$.ajax({
						type:"POST",
						url:"php/asignar.php",
						data:{ tarjeta: tarjeta, usuarioAsig:usuario, usuarioP : usuarioP , idAsig :idAsig} ,
						success:function(data){
							alert(data);
						}
					});
				}
				else{alert("No ha seleccionado ningun usuario para asignar la tarjeta.");}
			});

			$("#enviar2").click(function(){
				
				var usuario=$("#usuarioD").attr("value");
				var tarjeta=$(".valueCarta").attr("value");
				var usuarioP=$("#carta2").val();

				if(usuarioP!=""){
				
					$.ajax({
						type:"POST",
						url:"php/asignar.php",
						data:{ tarjeta: tarjeta, usuarioAsig:usuario, usuarioP : usuarioP , idAsig :idAsig} ,
						success:function(data){
							alert(data);
						}
					});
				}
				else{alert("No ha seleccionado ningun usuario para asignar la tarjeta.");}
			});

		}		
				
	});
}); 
