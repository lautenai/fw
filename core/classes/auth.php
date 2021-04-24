<?php
/**
 * 
 */
class Auth
{
  
  /*function __construct(argument)
  {
    # code...
  }*/

  public static function login($username, $password)
  {
    $user = ORM::for_table('users')
      ->where_equal('username', trim($username))
      ->find_one();
      if ($user) {
        if (password_verify($password, $user->password)) {
          return 'OK';
        } else {
          return 'NO';
        }
      } else {
        return 'user not found';
      }
  }

  public function register($username, $password, $confirm_password)
  {
    /*validate username
    trim username

    validate password
    confirm_password*/    
  }
}