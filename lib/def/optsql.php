<?php
namespace lib\Def;
class Optsql{
    const DB_HOST="localhost";
    const DB_PREFIX="xxx_";
    const DB_CHARSET="utf8";
    public $db_con;
    function __construct($ext){
        if(!$ext){
            switch($_SERVER['SERVER_NAME']){
            case 'vt2.my':$this->db_con=['root','root','vt'];break;
            case 'win2.my':$this->db_con=['root','root','winteh'];break;
            default:Route::location();
            }
        }else{
            switch($_SERVER['SERVER_NAME']){
                case 'vt2.my':$this->db_con=['root','root','vt_img'];break;
                case 'win2.my':$this->db_con=['root','root','winteh_img'];break;
                default:Route::location();
            }
        }
    }
}