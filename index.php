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
require 'classes/validator.php';
require 'classes/helpers.php';
require 'classes/url.php';
require 'classes/acl.php';

// require database
require 'config/database.php';

// require controllers
require 'controllers/controller.php';
require 'controllers/users.php';
require 'controllers/alunos.php';

// require models
require 'models/user.php';
require 'models/aluno.php';

// Run the router
require 'routes.php';
Route::run('/');

echo '
<section class="section">
	<div class="container">';

echo "<pre>";
printf("Total execution time: %.6fs\n", microtime(true) - $start);
echo "</pre>";

echo '
	</div>
</section>';

/*if (!empty($_GET OR $_POST)) {
	echo '<pre>' . print_r($_POST, true) . '</pre>';
	echo 'Verification has been : ' . (Csrf::verifyToken('home') ? 'successful' : 'unsuccessful');
}*/