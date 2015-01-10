$(function() {
	


	$('#search').keyup(function() {
	var busca=document.getElementById('search').value;
	

	numero=	event.keyCode;
	$("#botonBus").click(opcBus) ;

	if(numero=="13")
	{
			opcBus();
	}
	if(busca == ""){
			$("#busque").css("display","none");
	}
	else{
		if(busca != ""){
			$.ajax({
				type:"POST",
				url: "php/busqueda.php",
				data: { buscar : busca },
				success:function(data)
				{
					
					$(".searching").append($("#busque").html(data));
					$("#busque").css("display","block");
					$(".resultados").click(
						function()
							{
								
								var valor = $(this).attr("value");
								document.getElementById("search").value=valor;
								$("#busque").css("display","none");
								$.ajax({
									type:"POST",
									url: "php/consultaCartasAsigSoporte.php",
									data: { buscar : valor },
									success:function(data)
									{
										$(".contenedorusuario").css("display","block");
										$(".cartas").html(data);
										
										$("#bloquear").click
										(
											function()
											{
												
											
													var confirmar=confirm("Desea BloquEar el usuario "+valor);
													if(confirmar){
														var usuarioD=$("#usuarioD").attr("value");
														var usuarioR=valor;
														
														$.ajax(
														{
															type:"POST",
															url:"php/bloquearusuario.php",
															data:{usuarioD : usuarioD , usuarioR : usuarioR},
															success:function(data)
															{

																if(data="true")
																{
																	
																	document.location.reload();
																}
																else
																{
																	alert("A ocurrido un problema intentalo mas tarde.");
																	document.location.reload();
																}
															}
														});
													}
													else
													{
														alert("Ha cancelado la compra.")
														document.location.reload();
													}	
												
											}
										);
									}
								});
							}
						);
					}
				});
			}
		}
	});
	
function opcBus ()
							{
								
								var valor = $('#search').val();
								document.getElementById("search").value=valor;
								$("#busque").css("display","none");
								$.ajax({
									type:"POST",
									url: "php/consultaCartasAsigSoporte.php",
									data: { buscar : valor },
									success:function(data)
									{
										$(".contenedorusuario").css("display","block");
										$(".cartas").html(data);
										
										$("#bloquear").click
										(
											function()
											{
												
											
													var confirmar=confirm("Desea BloquEar el usuario "+valor);
													if(confirmar){
														var usuarioD=$("#usuarioD").attr("value");
														var usuarioR=valor;
														
														$.ajax(
														{
															type:"POST",
															url:"php/bloquearusuario.php",
															data:{usuarioD : usuarioD , usuarioR : usuarioR},
															success:function(data)
															{

																if(data="true")
																{
																	
																	document.location.reload();
																}
																else
																{
																	alert("A ocurrido un problema intentalo mas tarde.");
																	document.location.reload();
																}
															}
														});
													}
													else
													{
														alert("Ha cancelado la compra.")
														document.location.reload();
													}	
												
											}
										);
									}
								});
							}
});