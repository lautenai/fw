<?php

class Users extends Controller
{
	public function index()
	{
		$cache = new Cache();
	
		// $cache->erase('users');

		if ($cache->isCached('users')) {
			$caching =  "Cached";
			$users = $cache->retrieve('users');
		} else {
			$caching = "Not Cached";
			$users = ORM::for_table('users')->find_many();
			$cache->store('users', $users);
		}

		View::render('users/index', 'default', compact('users', 'caching'));
	}

	public function edit($id)
	{
		echo $id;
	}
}