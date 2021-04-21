<?php

class Users extends Controller
{
	public function index()
	{
		/*$cache = new Cache();
	
		$cache->erase('users');

		if ($cache->isCached('users')) {
			$caching =  "Cached";
			$users = $cache->retrieve('users');
		} else {
			$caching = "Not Cached";
			$users = ORM::for_table('users')->find_many();
			$cache->store('users', $users);
		}*/

		// $users = ORM::for_table('users')->find_many();

		$users = User::limit(15)->order_by_asc('name')->find_many();

		$caching = "Not Cached";
		
		View::render('users/index', 'default', compact('users', 'caching'));
	}

	public function edit($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			
			$user = User::find_one($id);
			
			if (empty($user)) {
				die('User not found');
			}

			View::render('users/edit', 'default', compact('user'));
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
			echo "post";
		}
	}
}