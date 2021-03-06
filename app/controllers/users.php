<?php

class Users extends Controller
{
	public function index()
	{
		isLoggedIn() ? Acl::check('view_users_index', $_SESSION['id'],$_SESSION['group_id']) : header("location: /login");
		$users = User::limit(5)->order_by_asc('username')->find_many();
		View::render('users/index', 'default', compact('users'));		
	}

	public function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {

			View::render('users/create', 'default');
			
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			if ($_POST['username'] AND $_POST['password']) {
				$user = Model::factory('User')->create();
				$user->group_id = 1;
				$user->username = trim($_POST['username']);
				$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->save();
			}

			return redirect('/users');
		}
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
			
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$user = Model::factory('User')->find_one($id);
			$user->username = $_POST['username'];
			$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			// $user->group_id = $_POST['group_id'];
			$user->save();

			return redirect('/users');
		}
	}

	public function signup()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		
			View::render('users/signup', 'default');
		
		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			if ($_POST['username'] AND $_POST['password']) {
				$user = Model::factory('User')->create();
				$user->group_id = 1;
				$user->username = trim($_POST['username']);
				$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->save();
			}

		}
	}

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {

			View::render('users/login');

		} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if ($_POST['username'] AND $_POST['password']) {
				if (Auth::login($_POST['username'], $_POST['password'])) {
					// Redirect user
					header("location: /");
				} else {
					header("location: /login");
				}
			} else {
				echo "Username or Password can not be null.";
			}
		}
	}

	public function logout()
	{
		// Initialize the session
		session_start();

		// Unset all of the session variables
		$_SESSION = array();

		// Destroy the session.
		session_destroy();

		// Redirect to login page
		header("location: login");
		exit;
	}
}

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

/*for ($i=0; $i < 10; $i++) { 
$user = Model::factory('User')->create();
$user->group_id = $i;
$user->username = $i.time().time();
$user->password = password_hash($i, PASSWORD_DEFAULT);
$user->save();
sleep(.1);
}*/

//REDIS
// $redis = new Redis();
// $redis->connect('127.0.0.1', 6379);

// if ($redis->exists('users')) {
// 	$caching =  "Cached";
// 	$users = unserialize($redis->get('users'));
// } else {
// 	$caching = "Not Cached";
// 	$users = User::limit(15)->order_by_asc('username')->find_many();
// 	/*$redis->set('users', serialize($users));
// 	$redis->expire('users', 2);*/
// 	cache('users', $users, 10);
// }