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
            case 'stroy.my':$this->db_con=['root','root','stroy'];break;
            case 'sota.my':$this->db_con=['root','root','sota'];break;
            case 'harvis.my':$this->db_con=['root','root','harvi'];break;
            case 'smoke.my':$this->db_con=['root','root','smoke'];break;
            case 'optstore.my':$this->db_con=['root','root','smoke'];break;
            case 'burger.my':$this->db_con=['root','root','burger'];break;
            case 'uniomart.my':$this->db_con=['root','root','uni'];break;
            default:Route::location();
            }
        }else{
            switch($_SERVER['SERVER_NAME']){
                case 'vt2.my':$this->db_con=['root','root','vt_img'];break;
                case 'win2.my':$this->db_con=['root','root','winteh_img'];break;
                case 'stroy.my':$this->db_con=['root','root','stroy_img'];break;
                case 'sota.my':$this->db_con=['root','root','sota_img'];break;
                case 'harvis.my':$this->db_con=['root','root','harvi_img'];break;
                case 'smoke.my':$this->db_con=['root','root','smoke_img'];break;
                case 'burger.my':$this->db_con=['root','root','burger'];break;
                case 'uniomart.my':$this->db_con=['root','root','uni'];break;
                default:Route::location();
            }
        }
    }
}