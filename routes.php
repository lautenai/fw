<?php
// Define base route
Route::add('/',function(){
	// Acl::check('view_admin_dashboard', 1,1);
	// echo "helper check: ";var_dump(acl('view_admin_dashboard', 1,1));
 
// Check if the user is logged in, if not then redirect him to login page
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
} else {
	View::render('home');
}*/
	View::render('home');

});

Route::add('/sql',function(){
	// echo password_hash('password', PASSWORD_DEFAULT);
	// echo "<hr>";
	echo Auth::login('lautenai', 'password');
});

/*
auth routes
	register
	login
	logout
*/

Route::add('/validator',function(){
  $v = new Validator(array('name' => 'Chester Tester'));
	$v->rule('required', 'Nome');
	$v->rule('email', 'Nome');
	$v->rule('integer', 'Nome');
	$v->rule('numeric', 'Nome');
	$v->rule('boolean', 'Nome');
	if($v->validate()) {
	    echo "Yay! We're all good!";
	} else {
	    // Errors
	    print_r($v->errors());
	}
});

// Route::add('/users', ['Users', 'index'] , 'get');
Route::get('/users', ['Users', 'index']);
Route::post('/users', ['Users', 'index']);
Route::add('/users/edit/(.*)', ['Users', 'edit'] , 'get');
Route::post('/users/edit/(.*)', ['Users', 'edit'] , 'post');
Route::get('/alunos', 'Alunos::index');
Route::get('/alunos/edit/(.*)', 'Alunos::edit');
Route::post('/alunos/edit/(.*)', 'Alunos::edit');

Route::add('/signup', ['Users', 'signup'] , ['get', 'post']);
Route::add('/login', ['Users', 'login'] , ['get', 'post']);
Route::add('/logout', ['Users', 'logout'] , ['get']);

// Register a contact route
Route::add('/contact',function(){
  View::render('contact');
},['get', 'post']);

// Error pages
Route::pathNotFound(function($path){
	View::render('404', 'default', ['path' => $path]);
});

Route::methodNotAllowed(function($path, $method){
  View::render('405', 'default', ['path' => $path, 'method' => $method]);
});