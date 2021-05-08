<?php

class Groups extends Controller
{
	public function index()
	{
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = 2;
		$offset = ($page - 1)  * $limit;
		$groups_total = Group::find_many();
		$total = count($groups_total);

		$groups = Group::select(['id', 'groupname'])->limit($limit)->offset($offset)->order_by_asc('id')->find_many();
		
		$paginator = Paginator::make($groups, $total, $limit);
		
		View::render('groups/index', 'default', compact('groups', 'paginator'));
	}

	public function view($id)
	{
		$group = Group::find_one($id);

		if (!$group) {
			die('no group_id');	
		}

		View::render('groups/view', 'default', compact('group'));
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
			$group = Group::find_one($id);
			
			if (empty($group)) {
				die('Group not found');
			}

			View::render('groups/edit', 'default', compact('group'));
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// $group = Model::factory('Group')->find_one($id);

			$group = Group::find_one($id);
			$group->groupname = $_POST['groupname'];
			$group->save();

			return redirect('/groups');
		}
	}
}

//$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);