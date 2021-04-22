<?php
$start = microtime(true);
session_start();
require '../paths.php';
Route::run('/');

echo '
<section class="section">
	<div class="container">';

echo "<pre>";
$duration = microtime(true) - $start;
printf("Total execution time: %.6fs\n", $duration );
echo "</pre>";

echo '
	</div>
</section>';

/*if (!empty($_GET OR $_POST)) {
	echo '<pre>' . print_r($_POST, true) . '</pre>';
	echo 'Verification has been : ' . (Csrf::verifyToken('home') ? 'successful' : 'unsuccessful');
}*/