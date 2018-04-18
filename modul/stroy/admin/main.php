<?php
namespace lib\Def;
use \lib\User as User;

$login='stroy';
$pass='123';
$dir_site='stroy';

$user=new User\Admin();
if(!$user->loginAdmin()){$module='404';}else{
  if(!isset($_COOKIE[$user->admin_form_login_cookie])){
    if(\lib\Post\Post::issetPostArr()){


      if($user->loginAdminFormIn($login,$pass)){

          Opt::$main_content.='login1 rout.php';
        //include '../modul/'.$dir_site.'/admin/rout.php';
      }else{
        Opt::$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
      }



    }else{
      Opt::$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
    }


  }elseif(!$user->loginAdminForm($login,$pass)){
    $user->setCookieAdminForm($login,'',0);
    //$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
  }else{
    include '../modul/'.$dir_site.'/admin/rout.php';
  }
}
