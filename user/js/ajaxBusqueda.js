$(function() {
	


	$('#search').keyup(function() {
	var busca=document.getElementById('search').value;
	var primeraLetra=busca.charAt(0);
	if(busca == ""){
			$("#busque").css("display","none");
	}
	else{
		if(busca != ""){
			$.ajax({
				type:"POST",
				url: "php/busqueda.php",
				data: { buscar : primeraLetra },
				success:function(data)
				{
					
					$(".searching").append($("#busque").html(data));
					$("#busque").css("display","inline-block");
					$(".resultados").hover(
						function(){$(this).css("background","blue");},
						function(){$(this).css("background","none");}
						);	
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