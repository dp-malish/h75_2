<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();
if(isset($_GET['i'])){$id=htmlspecialchars($_GET['i'],ENT_QUOTES);
    if(Validator::paternStrLink($id)){Img::getImgPng8($id,__DIR__.'/');}else Img::badImg();
}else Img::badImg();