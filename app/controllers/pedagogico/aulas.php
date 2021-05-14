<?php

class Aulas extends Controller
{
	public function index()
	{
		// isLoggedIn() ? Acl::check('view_users_index', $_SESSION['id'],$_SESSION['group_id']) : header("location: /login");
		
		$limit = 10;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$total = count(Aula::select(['id'])->find_many());
		// $offset = ($page - 1)  * $limit;
		$offset = $total - (($page - 1)  * $limit); // DESC
		// $aulas = Aula::select(['id', 'competencias'])->limit($limit)->offset($offset)->order_by_asc('id')->find_many();
		
		$aulas = Aula::select('pedagogico_aulas.id')
			// ->select('competencias')
			->select('objeto_de_conhecimento_conteudo')
			->select('inicio')
			->select('fim')
			// ->select('escolas.nome', 'escola_nome')
			->select('turmas.nome', 'turma_nome')
			->select('disciplinas.nome', 'disciplina_nome')
			// ->join('escolas', array('pedagogico_aulas.escola_id', '=', 'escolas.id'))
			->join('turmas', array('pedagogico_aulas.turma_id', '=', 'turmas.id'))
			->join('disciplinas', array('pedagogico_aulas.disciplina_id', '=', 'disciplinas.id'))
			// ->where_gt('id', $offset)
			->where_lt('id', $offset)
			->limit($limit)
			// ->order_by_asc('id')
			->order_by_desc('id')
			->find_many();

		$paginator = Paginator::make($aulas, $total, $limit);

		/*$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$offset = ($page - 1) * PER_PAGE;
		$total = count(Aula::id());
		$aulas = Aula::paginate(PER_PAGE, $offset);
		$paginator = Paginator::make($aulas, $total, PER_PAGE);*/
		
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