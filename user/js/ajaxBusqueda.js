$(function() {
	


	$('#search').keyup(function() {
	var busca=document.getElementById('search').value;
	
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
									url: "php/consultaCartasAsig.php",
									data: { buscar : valor },
									success:function(data)
									{
										$(".contenedorusuario").css("display","block");
										$(".cartas").html(data);

											var clicks=0;
												$(".contadorClick").click(
													function(){
														
														clicks++;
														mod=clicks % 2;
														
														if (mod==1)
															{
																$(".carta-item").css("background","green");
																$(this).css("opacity","0.5");
																var valorCarta = $(this).attr("value");
																
															}
															else
															{
																$(this).css("opacity","1");
																valorCarta="none";
															}
															$("#comprar").click
															(
																function()
																{
																	var usuarioD=$("#usuarioD").attr("value");
																	var usuarioR=valor;

																	
																	alert("Seguro de comprar //Christian lithgbox de confirmacion de compra");
																	$.ajax({
																		type:"POST",
																		url:"php/generaNotificacion.php",
																		data:{ valorC : valorCarta , usuarioD : usuarioD , usuarioR : usuarioR},
																		success:function(data)
																		{
																			alert(data);
																		}
																	});
																}
															)
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
	
	
});