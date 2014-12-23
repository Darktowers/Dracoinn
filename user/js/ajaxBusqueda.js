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
										$(".contenedorusuario").html(data);

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