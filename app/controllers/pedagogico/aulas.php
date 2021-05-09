<?php

class Aulas extends Controller
{
	public function index()
	{
		/*
		$limit = 15;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$offset = ($page - 1)  * $limit;
		$total = count(Aula::select(['id', 'competencias'])->find_many());
		$aulas = Aula::select(['id', 'competencias'])->limit($limit)->offset($offset)->order_by_asc('id')->find_many();
		$paginator = Paginator::make($aulas, $total, $limit);
		*/

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$offset = ($page - 1) * PER_PAGE;
		$total = count(Aula::id());
		$aulas = Aula::paginate(PER_PAGE, $offset);
		$paginator = Paginator::make($aulas, $total, PER_PAGE);
		
		View::render('aulas/index', 'default', compact('aulas', 'total','paginator'));
	}

	public function view($id)
	{
		$aula = Aula::find($id);

		if (!$aula) {
			die('no aula_id');	
		}

		View::render('aulas/view', 'default', compact('aula'));
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
			$aula = Aula::find_one($id);
			
			if (empty($aula)) {
				die('Aula not found');
			}

			View::render('aulas/edit', 'default', compact('aula'));
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// $aula = Model::factory('Aula')->find_one($id);

			$aula = Aula::find_one($id);
			$aula->aulaname = $_POST['aulaname'];
			$aula->save();

			return redirect('/aulas');
		}
	}
}

//$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);