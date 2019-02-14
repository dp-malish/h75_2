<?php
/**
 *   GET[id] - Искать в БД
 *   -----
 *   GET[i]  - Искать в каталоге
 *   Если GET[ep] (extend png) отсутствует - использовать jpg
 *   GET[ep]=0  -  png8
 *   GET[ep]=1  -  png24
 */
namespace lib\Img;
use lib\Def As Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../');spl_autoload_register();

if(isset($_GET['id'])){//Искать в БД
  $id=htmlspecialchars($_GET['id'],ENT_QUOTES);
  if(preg_match("/[0-9]+$/",$id))Img::getImg($id,'gallery_tile_img',null);
}elseif(isset($_GET['i'])){//Искать в каталоге
    $i=Def\Validator::html_cod($_GET['i']);
    if(Def\Validator::paternStrLink($i)){
        $dir=__DIR__.'/';
        if(isset($_GET['ep'])){//Работа с png
            $ep=Def\Validator::html_cod($_GET['ep']);
            if(preg_match("/[0-1]+$/",$ep)){
                if($ep==0){//png8
                    Img::getImgPng8($i,$dir);
                }elseif($ep==1){//png24
                    Img::getImgPng24($i,$dir);
                }else Img::badImg();
            }else Img::badImg();
        }else{// Работа с jpg
            Img::getImgJpg($i,$dir);
        }
    }else Img::badImg();
}else Img::badImg();