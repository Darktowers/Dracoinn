var $boton = $('#boton'),
	$boton2 = $("#botonnoti"),
	$menu = $('#menu'),
	$menu2 = $("#notificaciones"),
	$switchs = 0,
	$switchs2 = 0;

function mostrarMenu () {
	
	if($switchs == 0){

		$menu.slideToggle();
		
		$boton.addClass('addboton');
		$switchs = 1;
	}else{
		$menu.slideToggle();

		$boton.removeClass('addboton');
		$switchs = 0;
	}
	
	

}
function mostrarMenu1 () {
	
	if($switchs2 == 0){

		$menu2.slideToggle();
		
		$boton2.addClass('addboton1');
		$switchs2 = 1;
	}else{
		$menu2.slideToggle();

		$boton2.removeClass('addboton1');
		$switchs2 = 0;
	}
	
	

}

$boton.click(mostrarMenu);
$boton2.click(mostrarMenu1);