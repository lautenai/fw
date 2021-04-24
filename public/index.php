<?php
ini_set('display_errors', 'On');
$start = microtime(true);
session_start();
require '../paths.php';

// Run the router
Route::run('/');

echo '
<section class="section">
	<div class="container">';
echo "<pre>";
// printf("Total execution time: %.6fms\n", number_format((microtime(true) - $start) * 1000, 2));
echo 'TIME: '.number_format((microtime(true) - $start) * 1000, 2) . 'ms';
echo "</pre>";
echo '
	</div>
</section>';

/*if (!empty($_GET OR $_POST)) {
	echo '<pre>' . print_r($_POST, true) . '</pre>';
	echo 'Verification has been : ' . (Csrf::verifyToken('home') ? 'successful' : 'unsuccessful');
}*/