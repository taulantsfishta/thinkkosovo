<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginadmin {

  public function __construct()
  {
    $this->ci =&get_instance();
  }

  public function checkUser($username,$password)
  {
      $query = $this->ci->db->select()
                             ->from('user_login')
                             ->where('username',$username)
                             ->where('password',$password)
                             ->get()
                             ->num_rows();
      if($query>0){
        return true;
      }else{
        return false;
      }
  }


}
