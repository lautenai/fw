<?php

class Alunos extends Controller
{
	public function index()
	{
		$cache = new Cache();
	
		// $cache->erase('alunos');

		if ($cache->isCached('alunos')) {
			$caching =  "Cached";
			$alunos = $cache->retrieve('alunos');
		} else {
			$caching = "Not Cached";
			$alunos = ORM::for_table('alunos')->find_many();
			$cache->store('alunos', $alunos);
		}

		View::render('alunos/index', 'default', compact('alunos', 'caching'));
	}
}