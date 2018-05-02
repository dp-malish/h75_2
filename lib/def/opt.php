<?php
namespace lib\Def;
class Opt{
	const SOLT="is_solt";
	const COOKIE_SALT="tryam";

	static $protocol='https://';
	static $site='';
	static $dir_name_site='';

	static $css='';
	static $css_down='';
	static $jscript='';
	static $js_down='';

	static $title='';
	static $description='';
	static $keywords='';

	static $l_content_up='';
	static $l_content='';
	static $main_content_up='';
    static $main_content='';
	static $r_content='';

	function __construct($dir_name_site=''){
        self::$protocol=((!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
        self::$site=$_SERVER['SERVER_NAME'];
        self::$dir_name_site=$dir_name_site;
    }


}