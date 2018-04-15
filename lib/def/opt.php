<?php
namespace lib\Def;
class Opt{
	const SOLT="is_solt";
	const COOKIE_SALT="tryam";

	static $protocol='https://';
	static $site='';

	static $l_content='';
	static $main_content='';
	static $r_content='';

	function __construct(){
        self::$protocol=((!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
        self::$site=$_SERVER['SERVER_NAME'];
    }


}