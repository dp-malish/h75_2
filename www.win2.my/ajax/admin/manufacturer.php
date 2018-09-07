<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 07.09.2018
 * Time: 1:27
 */
namespace lib\Post;
use incl\win\Manufacturer as Manufactur;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

if(Post::issetPostArr()){
    if(isset($_POST['laptop'])){
        if(Manufactur\Manufacturer::updLaptop()){
            echo json_encode(['err'=>false,'answer'=>'Изменения произведены...']);
        }else{Post::answerErrJson();}


    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];