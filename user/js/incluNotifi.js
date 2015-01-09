function inclucionNotificaciones (){
	var usuario=$("#usuarioD").attr("value");
	
	$.ajax({
		type:"POST",
		url:"php/notificacion.php",
		data:{usuario: usuario},
		success:function(data)
		{
			$("#incluNotifi").html(data);
			
		}
	});
}
$(function(){
	inclucionNotificaciones();
});