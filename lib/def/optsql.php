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
            case 'stroy.my':$this->db_con=['root','root','stroy'];break;
            case 'www.stroy.my':$this->db_con=['root','root','stroy'];break;
            default:$this->db_con=['root','root','malish'];
            }
        }else{
            switch($_SERVER['SERVER_NAME']) {
                case'stroy.my':$this->db_con=['root','root','stroy_img'];break;
                case'www.stroy.my':$this->db_con = ['root','root','stroy_img'];break;
                default:$this->db_con=['root','root','malish'];
            }
        }
    }
}