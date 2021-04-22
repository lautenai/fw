<?php
class Acl
{
    private static $user_empty = false;

    function check($permission, $user_id, $group_id)
    {

        //we check the user permissions first
        if (!self::user_permissions($permission, $user_id))
        {
            die($permission . ' not allowed for user_id.');
            return false;
        }
        
        if (!self::group_permissions($permission, $group_id) && self::isUserEmpty())
        {
            die($permission . ' not allowed in group_id.');
            return false;
        }

        return true;
    }

    public static function user_permissions($permission, $user_id)
    {
        $user_permissions = ORM::for_table('user_permissions')->where('permission_name', $permission)->where('user_id', $user_id)->count();

       if ($user_permissions > 0) {
           $user_permission = ORM::for_table('user_permissions')->where('permission_name', $permission)->where('user_id', $user_id)->find_one();
           
           if ($user_permission->permission_type == 0) {
            return false;
           }
           return true;
       } else {
          self::setUserEmpty('true');
       }
       return true;
    }

    public static function group_permissions($permission, $group_id)
    {
        $group_permissions = ORM::for_table('group_permissions')->where('permission_name', $permission)->where('group_id', $group_id)->count();

        if ($group_permissions > 0) {
          $group_permission = ORM::for_table('group_permissions')->where('permission_name', $permission)->where('group_id', $group_id)->find_one();
          if ($group_permission->permission_type == 0) {
            return false;
          }
          // return true;
        } else {
          return false;
        }
        return true;
    }

    public static function setUserEmpty($val)
    {
        self::$user_empty = $val;
    }

    public static function isUserEmpty()
    {
        return self::$user_empty;
    }

}

/*$acl = new Acl();
if (!$acl->check(view_admin_dashboard, 1, 1))
{
    // user doesn't have permission to execute the following action
    //do something here
    
}*/

/*CREATE TABLE users (
 user_id INT(10) NOT NULL AUTO_INCREMENT,
 group_id INT(10) NOT NULL,
 username VARCHAR(255) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 reg_date INT(10),
 PRIMARY KEY(user_id)
);

CREATE TABLE usergroups (
 group_id INT(10) NOT NULL AUTO_INCREMENT,
 group_name VARCHAR(100) NOT NULL,
 PRIMARY KEY(group_id)
);

CREATE TABLE user_permissions (
 pid INT(10) NOT NULL AUTO_INCREMENT,
 permission_name VARCHAR(100) NOT NULL,
 permission_type INT(1),
 user_id INT(10) NOT NULL,
 PRIMARY KEY (pid)
);

CREATE TABLE group_permissions (
 pid INT(10) NOT NULL AUTO_INCREMENT,
 permission_name VARCHAR(100) NOT NULL,
 permission_type INT(1),
 group_id INT(10) NOT NULL,
 PRIMARY KEY (pid)
);*/