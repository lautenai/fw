<?php

class Aulas extends Controller
{
	public function index()
	{
		$limit = 15;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$offset = ($page - 1)  * $limit;
		$total = count(Aula::select(['id', 'competencias'])->find_many());

		$aulas = Aula::select(['id', 'competencias'])->limit($limit)->offset($offset)->order_by_asc('id')->find_many();
		
		$paginator = Paginator::make($aulas, $total, $limit);
		
		View::render('aulas/index', 'default', compact('aulas', 'paginator'));
	}

	public function view($id)
	{
		$group = Aula::find_one($id);

		if (!$group) {
			die('no group_id');	
		}

		View::render('aulas/view', 'default', compact('group'));
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
			$group = Aula::find_one($id);
			
			if (empty($group)) {
				die('Aula not found');
			}

			View::render('aulas/edit', 'default', compact('group'));
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// $group = Model::factory('Aula')->find_one($id);

			$group = Aula::find_one($id);
			$group->groupname = $_POST['groupname'];
			$group->save();

			return redirect('/aulas');
		}
	}
}

//$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);