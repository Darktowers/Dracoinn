function inclucionNotificaciones (){
	var usuario=$("#usuarioD").attr("value");
	
	$.ajax({
		type:"POST",
		url:"php/notificacion.php",
		data:{usuario: usuario},
		success:function(data)
		{
			$("#incluNotifi").html(data);
			$(".notifInclu").click(function(){
				var valores= $(this).attr("value");
				$.ajax({
					type:"POST",
					url:"php/cambiaEstadoNotifi.php",
					data:{idNofi : valores},
					success:function(data)
					{
						if(data=="true")
							{
								inclucionNotificaciones();
							}
					}
				});
			});
		}
	});
}
$(function(){
	inclucionNotificaciones();
});