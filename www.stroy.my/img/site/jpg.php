<?php
namespace lib\Img;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../');spl_autoload_register();
if(isset($_GET['i'])){$id=htmlspecialchars($_GET['i'],ENT_QUOTES);
    if(\lib\Def\Validator::paternStrLink($id)){Img::getImgJpg($id,__DIR__.'/');}else Img::badImg();
}else Img::badImg();