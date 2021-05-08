<?php

class Helpers
{
	public static function _method()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST'){
		    // Method is POST
		    return 'post';
		} elseif ($method == 'GET'){
		    // Method is GET
		    return 'get';
		} elseif ($method == 'PUT'){
		    // Method is PUT
		    return 'put';
		} elseif ($method == 'DELETE'){
		    // Method is DELETE
		    return 'delete';
		} else {
		    // Method unknown
		    return 'unknown';
		}
	}

	public static function method()
	{
		// --------------------------------------------------------------
		// The method can be spoofed using a POST variable. This allows 
		// HTML forms to simulate PUT and DELETE methods.
		// --------------------------------------------------------------
		return (isset($_POST['request_method'])) ? $_POST['request_method'] : $_SERVER['REQUEST_METHOD'];
	}

	public function is_get()
	{	
		$method = $_SERVER['REQUEST_METHOD'];
		
		if ($method == 'GET'){
		    // Method is GET
		    return true;
		}
	}

	public function memory()
	{
		return number_format(memory_get_usage() / 1024 / 1024, 2);
	}

	function convert($size)
	{
	    $unit=array('b','kb','mb','gb','tb','pb');
	    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}
}