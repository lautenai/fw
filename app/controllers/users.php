<?php

class Users extends Controller
{
	public function index()
	{
		// Acl::check('view_admin_dashboard', 1,1);
		
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

		//REDIS
		$redis = new Redis();
		$redis->connect('127.0.0.1', 6379);

		if ($redis->exists('users')) {
			$caching =  "Cached";
			$users = unserialize($redis->get('users'));
		} else {
			$caching = "Not Cached";
			$users = User::limit(15)->order_by_asc('username')->find_many();
			$redis->set('users', serialize($users));
			$redis->expire('users', 2);
		}

		/*$users = User::limit(15)->order_by_asc('username')->find_many();

		$caching = "Not Cached";*/

		// dd($users);
		
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