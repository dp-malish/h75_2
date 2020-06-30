<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 30.06.2020
 * Time: 10:47
 */
namespace lib\Def;
use incl\win\Def\Template;

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('win');//Def opt

Cache_File::$cash=new Cache_File(['win'],true);

$bot=new UserAgent();

//if(!$bot->isBot()){include'../blocks/win/rek/google.php';}

new Template();