<?php
session_start();
	function my_autoloader($class) 
	{	
		     include_once  'vueCentrale'.$class . '.php';
		 
						
	}
	spl_autoload_register('my_autoloader');
?>