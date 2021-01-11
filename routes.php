<?php
// Define base route
Route::add('/',function(){
  View::render('home');
});

// Register a contact route
Route::add('/contact',function(){
  View::render('contact');
},['get', 'post']);

// Register a imprint route
Route::add('/imprint',function(){
  View::render('imprint');
});

// Error pages
Route::pathNotFound(function($path){
	View::render('404', 'default', ['path' => $path]);
});

Route::methodNotAllowed(function($path, $method){
  View::render('405', 'default', ['path' => $path, 'method' => $method]);
});

// Define base route
Route::add('/alunos',function(){
	// $alunos = Aluno::find_many();
	// $alunos = ORM::for_table('alunos')->where_id_in([1,2,3])->find_many();
	// $number_of_alunos = ORM::for_table('alunos')->count();

	$cache = new Cache();
	
	// $cache->erase('alunos');

	if ($cache->isCached('alunos')) {
		$caching =  "Cached";
		$alunos = $cache->retrieve('alunos');
	} else {
		$caching = "Not Cached";
		$alunos = ORM::for_table('alunos')->where_id_in([1,2,3])->find_many();
		$cache->store('alunos', $alunos);
	}

  	
  	View::render('alunos/index', 'default', compact('alunos', 'caching'));
});