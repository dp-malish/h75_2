<?php
$login='harvis';
$pass='1234';
$dir_site='harvis';

$user=new User();
if(!$user->loginAdmin()){$module='404';}else{
    if(!isset($_COOKIE['af'])){
        if(PostRequest::issetPostArr()){
            if($user->loginAdminFormIn($login,$pass)){include'../modul/'.$dir_site.'/admin/rout.php';
            }else{$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');}
        }else{$main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');}
    }elseif(!$user->loginAdminForm($login,$pass)){
        $user->setCookieAdminForm($login,'',0);
        $main_content=$Cash->SendHTML('../models/admin/AdminLogin.php');
    }else{include'../modul/'.$dir_site.'/admin/rout.php';}
}
