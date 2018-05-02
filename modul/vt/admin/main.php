<?php
namespace lib\Def;
use \lib\User as User;

$login='vt';
$pass='123';

$user=new User\Admin();
if(!$user->loginAdmin()){$module='404';}else{
  if(!isset($_COOKIE[$user->admin_form_login_cookie])){//если нет куков формы админа
    if(\lib\Post\Post::issetPostArr()){

      if($user->loginAdminFormIn($login,$pass)){
        include '../modul/'.Opt::$dir_name_site.'/admin/rout.php';
      }else{
        Opt::$main_content=$Cash->SendHTML('../model/admin/AdminLogin.php');
      }
    }else{
      Opt::$main_content=$Cash->SendHTML('../model/admin/AdminLogin.php');
    }
  }elseif(!$user->loginAdminForm($login,$pass)){//проверка куков формы админа на соответствие
    $user->setCookieAdminForm($login,'',0);
    Opt::$main_content=$Cash->SendHTML('../model/admin/AdminLogin.php');
  }else{//куки впороядке вход
    include '../modul/'.Opt::$dir_name_site.'/admin/rout.php';
  }
}
