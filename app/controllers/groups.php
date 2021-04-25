<?php

class Groups extends Controller
{
	public function index()
	{
		$groups = Group::limit(10)->order_by_asc('group_name')->find_many();		
		/*echo "<code>";
		foreach (ORM::get_query_log() as $log) {
			echo $log .'<br>';
		}
		echo "</code>";*/

		View::render('groups/index', 'default', compact('groups'));
	}
}

//$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);