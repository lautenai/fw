<?php
class View{

	public static function render($name, $layout='default', $arguments = []) {
		// Catch the page results and send them to the main portal
		Portal::sendStart();
		if(is_array($arguments)){
			extract($arguments);
		}
		include('../app/views/'.$name.'.php');
		Portal::sendEnd('main');

		// Include the layout
		include('../app/themes/adminlte/layouts/'.$layout.'.php');
	}
	
}
