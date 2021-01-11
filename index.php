<?php
$start = microtime(true);
session_start();

// require classes
require 'classes/route.php';
require 'classes/view.php';
require 'classes/portal.php';
require 'classes/component.php';
require 'classes/idiorm.php';
require 'classes/paris.php';
require 'classes/csrf.php';
require 'classes/cache.php';

// require database
require 'config/database.php';

// require models
require 'models/aluno.php';

// Run the router
require 'routes.php';
Route::run('/');

printf("Total execution time: %.6fs\n", microtime(true) - $start);

/*if (!empty($_GET OR $_POST)) {
	echo '<pre>' . print_r($_POST, true) . '</pre>';
	echo 'Verification has been : ' . (Csrf::verifyToken('home') ? 'successful' : 'unsuccessful');
}*/