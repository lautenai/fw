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

  /*public function loggedin()
  {
    return $_SESSION['loggedin'] ? true : false;
  }*/

  public static function login($username, $password)
  {
    $user = ORM::for_table('users')
      ->where_equal('username', trim($username))
      ->find_one();
      if ($user) {
        if (password_verify($password, $user->password)) {
          // Password is correct, so start a new session
          session_start();
          // Store data in session variables
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $user->id;
          $_SESSION["username"] = $user->username;

          return true;
        } else {
          return false;
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