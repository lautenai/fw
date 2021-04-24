<?php

class Groups extends Controller
{
	public function index()
	{
		$groups = Group::limit(10)->order_by_asc('group_name')->find_many();
		View::render('groups/index', 'default', compact('groups'));
	}
	// print_r(ORM::get_query_log());
}

//$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

//$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);