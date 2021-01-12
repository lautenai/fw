<?php
// Define base route
Route::add('/',function(){
  View::render('home');
});

Route::add('/validator',function(){
  $v = new Validator(array('name' => 'Chester Tester'));
	$v->rule('required', 'name');
	if($v->validate()) {
	    echo "Yay! We're all good!";
	} else {
	    // Errors
	    print_r($v->errors());
	}
});

Route::add('/users', ['Users', 'index'] , 'get');
Route::add('/users/edit/(.*)', ['Users', 'edit'] , 'get');
Route::add('/alunos', ['Alunos', 'index'] , 'get');

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