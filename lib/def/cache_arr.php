<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 17.08.2018
 * Time: 12:13
 */

namespace lib\Def;


class Cache_Arr extends Cache_File{

    protected $dir_arr;



    function __construct($dir=[],$add=false){
        parent::__construct($dir, $add);

        $this->dir_arr=$this->dir.'arr/';

        Opt::$main_content.='<div class="fon_c">'.$this->dir.'<br>'.$this->dir_arr.'</div>';
    }

    function getContentCache(){

        $DBTable='manufacturer';


        $DB=new SQLi();
        $sql='SELECT manufacturer_id,image,name,sort_order FROM manufacturer';
        $res=$DB->arrSQL($sql);
        $content=json_encode($res);

        if($res){
            Opt::$main_content.='<div class="fon_c">'.$DBTable.'</div>';
            foreach($res as $k=>$v){Opt::$main_content.='<div class="fon_c">'.$v['manufacturer_id'].'  -  '.$v['name'].'</div>';}
        }


        Opt::$main_content.='<div class="fon_c">'.$content.'</div>';
    }



}