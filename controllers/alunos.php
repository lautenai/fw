<?php

class Alunos extends Controller
{
	public function index()
	{
		/*$cache = new Cache();
	
		$cache->erase('alunos');

		if ($cache->isCached('alunos')) {
			$caching =  "Cached";
			$alunos = $cache->retrieve('alunos');
		} else {
			$caching = "Not Cached";
			$alunos = ORM::for_table('alunos')->find_many();
			$cache->store('alunos', $alunos);
		}*/

		// $alunos = ORM::for_table('alunos')->find_many();
		$alunos = Aluno::find_many();

		$caching = "Not Cached";
		
		View::render('alunos/index', 'default', compact('alunos', 'caching'));
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
			$aluno = Aluno::find_one($id);
			
			if (empty($aluno)) {
				die('Aluno not found');
			}

			View::render('alunos/edit', 'default', compact('aluno'));
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
			
			$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$aluno = Aluno::find_one($id);
			$aluno->nome = $_POST['nome'];
			$aluno->save();

			URL::redirect('/alunos');
		}
	}
}