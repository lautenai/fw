<?php
class DB
{
	private static $instance;

	public function conn()
	{
		if (isset(self::$instance)) {
			self::$instance = new PDO($conn = 'mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME . ','.DB_USERNAME.','.DB_PASSWORD);
		} else {
			return self::$instance;
		}
	}
}