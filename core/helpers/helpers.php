<?php
function dd($value)
{
	die(highlight_string("<?php\n" . var_export($value, true) . ";\n?>"));
}

function to($url)
{
	// $http_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$http_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] .'/';
	return $http_https.$url ;
}

function redirect($url, $status = 302, $https = null)
{
	header('Location: '. URL_BASE .'/'. $url);
	exit;
}

function acl($permission, $user_id, $group_id){
	return Acl::check($permission, $user_id, $group_id);
}

function is_logged_in()
{
	if (isset($_SESSION['id'])) {
		return true;
	} else {
		return false;
	}
}

function id()
{
	if (isset($_SESSION['id'])) {
		return $_SESSION['id'];
	} else {
		return false;
	}
}

function username()
{
	if (isset($_SESSION['username'])) {
		return $_SESSION['username'];
	} else {
		return false;
	}
}

function cache($key, $data, $expire)
{
	$redis = new Redis();
	$redis->connect('127.0.0.1', 6379);
	$redis->set($key, serialize($data));
	$redis->expire($key, $expire);
}