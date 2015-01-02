var $boton = $('#boton'),
	$menu = $('#menu'),
	$switchs = 0;

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

$boton.click(mostrarMenu);