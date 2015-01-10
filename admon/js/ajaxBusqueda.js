$(function() {
	


	$('#search').keyup(function() {
	var busca=document.getElementById('search').value;
	var usuarioD=$("#usuarioD").attr("value");


	numero=	event.keyCode;
	$("#botonBus").click(opcBus) ;

	if(numero=="13")
	{
			opcBus();
	}

	if(busca == "" ){
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
								if(valor != usuarioD){
									document.getElementById("search").value=valor;
									$("#busque").css("display","none");
									$.ajax({
										type:"POST",
										url: "php/consultaCartasAsig.php",
										data: { buscar : valor },
										success:function(data)
										{
											$(".contenedorusuario").css("display","block");
											$(".cartas").html(data);
											
											$("#comprar").click
											(
												function()
												{
													
													var valorCarta = $("input:checked").val();
													if (valorCarta)
													{
														var confirmar=confirm("Desea continuar con la compra.");
														if(confirmar){
															var usuarioD=$("#usuarioD").attr("value");
															var usuarioR=valor;
															
															$.ajax(
															{
																type:"POST",
																url:"php/generaNotificacion.php",
																data:{ valorC : valorCarta , usuarioD : usuarioD , usuarioR : usuarioR},
																success:function(data)
																{
																	if(data="true")
																	{
																		alert("Se genero correctamente la solicitud.");
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
													else
													{
														alert("No a seleccionado ninguna carta");
													}
												}
											);
										}
									});
								}
							}
						);
					}
				});
			}
		}
	});
	
function opcBus()
{
	var valor = $('#search').val();
	var usuarioD=$("#usuarioD").attr("value");
								if(valor != usuarioD){
									document.getElementById("search").value=valor;
									$("#busque").css("display","none");
									$.ajax({
										type:"POST",
										url: "php/consultaCartasAsig.php",
										data: { buscar : valor },
										success:function(data)
										{
											$(".contenedorusuario").css("display","block");
											$(".cartas").html(data);
											
											$("#comprar").click
											(
												function()
												{
													
													var valorCarta = $("input:checked").val();
													if (valorCarta)
													{
														var confirmar=confirm("Desea continuar con la compra.");
														if(confirmar){
															var usuarioD=$("#usuarioD").attr("value");
															var usuarioR=valor;
															
															$.ajax(
															{
																type:"POST",
																url:"php/generaNotificacion.php",
																data:{ valorC : valorCarta , usuarioD : usuarioD , usuarioR : usuarioR},
																success:function(data)
																{
																	if(data="true")
																	{
																		alert("Se genero correctamente la solicitud.");
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
													else
													{
														alert("No a seleccionado ninguna carta");
													}
												}
											);
										}
									});
								}	
	
}
});