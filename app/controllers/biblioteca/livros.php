<?php

class Livros extends Controller
{
	public function index()
	{
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$offset = ($page - 1) * PER_PAGE;
		$total = count(Livro::id());
		$livros = Livro::paginate(PER_PAGE, $offset);
		$paginator = Paginator::make($livros, $total, PER_PAGE);
		
		View::render('biblioteca/livros/index', 'default', compact('livros', 'total', 'paginator'));
	}

	public function view($id)
	{
		$group = Livro::find_one($id);

		if (!$group) {
			die('no group_id');	
		}

		View::render('livros/view', 'default', compact('group'));
	}

	public function create()
	{
		/*Livro::create([
			'escola_id' => 1,
			'cadastrado_por' => 1,
			'tipo' => 'livro',
			'codigo' => time(),
			'numero' => time(),
			'titulo' => 'Eu Sou o Lau',
			'autores' => 'Lautenai Jr'
		]);*/
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
			$group = Livro::find_one($id);
			
			if (empty($group)) {
				die('Livro not found');
			}

			View::render('livros/edit', 'default', compact('group'));
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// $group = Model::factory('Livro')->find_one($id);

			$group = Livro::find_one($id);
			$group->groupname = $_POST['groupname'];
			$group->save();

			return redirect('/livros');
		}
	}

	public function delete(int $id)
	{
		return Livro::delete($id);
	}
}

//$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

/*
		$limit = 10;
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$offset = ($page - 1)  * $limit;
		
		$total = count(Livro::select(['id'])->find_many());

		$livros = Livro::select(['id', 'titulo', 'autores'])->limit($limit)->offset($offset)->order_by_desc('id')->find_many();

		$livros = ORM::for_table('biblioteca_items')
		->select('escolas.id', 'escola_id')
		->select('escolas.nome', 'escola_nome')
		->select('biblioteca_items.id', 'biblioteca_item_id')
		->select('biblioteca_items.titulo')
		->join('escolas', array('biblioteca_items.escola_id', '=', 'escolas.id'))
		->limit($limit)
		->offset($offset)
		->order_by_desc('biblioteca_item_id')
		->find_many();

		// SELECT * FROM `biblioteca_items` JOIN `escolas` ON `escolas`.`escola_id` = `biblioteca_items`.`escola_id` ORDER BY `id` DESC LIMIT 10 OFFSET 0
		
		$paginator = Paginator::make($livros, $total, $limit);
		*/