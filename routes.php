<?php
// Define base route
Route::add('/',function(){
	// Acl::check('view_admin_dashboard', 1,1);
	// echo SITENAME;
	View::render('home');
});

Route::add('/sql',function(){
	// echo password_hash('password', PASSWORD_DEFAULT);
	// echo "<hr>";
	echo Auth::login('lautenai', 'password');
});

Route::add('/validator',function(){
  	// https://github.com/vlucas/valitron
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
Route::add('/users/create', ['Users', 'create'] , ['get', 'post']);
Route::add('/users/edit/(.*)', ['Users', 'edit'] , ['get', 'post']);

/*Route::add('/users/edit/(.*)', ['Users', 'edit'] , 'get');
Route::post('/users/edit/(.*)', ['Users', 'edit'] , 'post');*/

Route::add('/signup', ['Users', 'signup'] , ['get', 'post']);
Route::add('/login', ['Users', 'login'] , ['get', 'post']);
Route::add('/logout', ['Users', 'logout'] , ['get']);

Route::get('/groups', 'Groups::index');
Route::get('/groups/view/(.*)', ['Groups', 'view']);
Route::add('/groups/edit/(.*)', ['Groups', 'edit'] , ['get', 'post']);


Route::get('/aulas', ['Aulas', 'index']);


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