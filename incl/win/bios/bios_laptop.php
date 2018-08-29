<?php
/***Гдавный класс работы с биосом*/
namespace incl\win\Bios;
use lib\Def as Def;
use incl\win\Def as WinDef;
class Bios_laptop{

    private $manuf_laptop_arr;//производители ноутбуков (массив)

    function __construct(){
        $cache_arr=new Def\Cache_Arr(['win'],true);
        //берём массив производителей
        $this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');
        //Маршрутизация биоса
        $this->routBios();
    }

    private function routBios(){//Маршрутизация биоса
        if(!isset(Def\Route::$uri_parts[1])){$this->routUri0();
        }elseif(!isset(Def\Route::$uri_parts[2])){
            $uri_parts_1=explode('-',trim(Def\Route::$uri_parts[1],' '),2);
            if(!isset($uri_parts_1[1])){//Предпологается название производителя одним словом без тире
                $this->routUri1_Manufacture();
            }else{
                $this->routUri1_GetBios($uri_parts_1[0],$uri_parts_1[1]);
            }
        }else Def\Route::$module404=true;
    }

    private function getManufacturerId($val){
        $x=false;
        foreach($this->manuf_laptop_arr AS $v){
            if($v['name']==$val || mb_strtolower($v['name'],'UTF-8')==$val){
                $x=$v['manufacturer_id'];break;}
        }return $x;
    }
    private function getManufacturer($id){
        $x=false;
        foreach($this->manuf_laptop_arr AS $v){
            if($v['manufacturer_id']==$id){$x=$v['name'];break;}
        }return $x;
    }

    private function routUri0(){

        Def\Opt::$title='БИОС для ноутбука - Скачать БИОС для ноутбука различных производителей';
        Def\Opt::$description='БИОС для ноутбука - Скачать БИОС для ноутбука различных производителей. Сервисный центр «WinTeh». Ремонт компьютерной и офисной техники.';
        Def\Opt::$main_content.='<div class="fon_c"><article><h3><abbr title="Базовая система ввода-вывода">БИОС</abbr> ноутбука</h3><h4>BIOS (Basic Input/Output System - базовая система ввода/вывода) - это ...</h4><p>Для начала уточним: <strong>BIOS (Basic Input/Output System - базовая система ввода/вывода) - это набор программ или команд</strong>, записанных в микросхеме и предназначена для:</p><ul class="five"><li>- хранение аппаратной конфигурации ноутбука;</li><li>- проведения процедуры диагностики компонентов ноутбука;</li><li>- обеспечения начального запуска ноутбука с последующим запуском <abbr title="Операционная система">ОС</abbr>;</li><li>- поддержка алгоритмов ввода/вывода с помощью процедурных прерываний.</li></ul></div>';
        Def\Opt::$main_content.='<div class="fon_c"><h4>Скачать <abbr title="Базовая система ввода-вывода">БИОС</abbr> для ноутбука производителя:</h4>';
        Def\Opt::$main_content.='<ul class="nav_link five">';
        foreach($this->manuf_laptop_arr AS $v){
            Def\Opt::$main_content.='<li><a href="'.mb_strtolower($v['name'],'UTF-8').'"><abbr title="Basic input/output system">BIOS</abbr> '.$v['name'].'</a></li>';
        }
        Def\Opt::$main_content.='</ul></div>';
        Def\Opt::$main_content.='<div class="fon_c"><p>Этот список <abbr title="Базовая система ввода-вывода">БИОС</abbr> пригодится не раз. </p><p>На современных версиях ноутбуков <abbr title="Basic input/output system">BIOS</abbr> выглядят по-разному, но основная задача у них одна — хранить начальные настройки системы и производить диагностику работоспособности ноутбука. Современные системы представят Вам интерфейс <abbr title="Unified Extensible Firmware Interface">UEFI</abbr>, часто отличающийся не только внешним видом, но и поддержкой мыши и русского языка.</p></article></div>';
    }

    private function routUri1_Manufacture(){
        $id=$this->getManufacturerId(Def\Route::$uri_parts[1]);
        if($id){
            $DB=new Def\SQLi();
            $res=$DB->arrSQL('SELECT link,manufacturer_id,model FROM bios_laptop WHERE manufacturer_id='.$id);
            if($res){
                $manufactur=$this->getManufacturer($id);
                Def\Opt::$title='БИОС для ноутбука '.$manufactur.' - Скачать БИОС для ноутбука '.$manufactur;
                Def\Opt::$description='БИОС для ноутбука '.$manufactur.' - скачать БИОС для ноутбука '.$manufactur.'. Сервисный центр «WinTeh». Ремонт компьютерной и офисной техники.';
                Def\Opt::$main_content.='<div class="fon_c"><h3><abbr title="Базовая система ввода-вывода">БИОС</abbr> для ноутбуков '.$manufactur.'</h3><ul class="nav_link five">';
                foreach($res as $k=>$v){
                    Def\Opt::$main_content.='<li><a href="/'.Def\Route::$uri_parts[0].'/'.Def\Route::$uri_parts[1].'-'.$v['link'].'">Скачать <abbr title="Basic input/output system">BIOS</abbr> '.Def\Route::$uri_parts[1].' '.$v['model'].'</a></li>';
                }
                Def\Opt::$main_content.='<li> </li><li><a href="/'.Def\Route::$uri_parts[0].'/">&#8656; Назад в раздел</a></li></ul></div>';
            }else Def\Route::$module404=true;
        }else Def\Route::$module404=true;
    }

    private function routUri1_GetBios($manufactur,$model){

        $id_manufactur=$this->getManufacturerId($manufactur);
        if($id_manufactur){
            $DB=new Def\SQLi();
            $sql='SELECT /*f.id, f.link,*/ f.manufacturer_id, /*f.model,*/ s.model_motherboard, s.rev_motherboard, s.ver_bios, s.download_table, s.download_table_id, s.level, s.notes FROM bios_laptop f RIGHT JOIN bios_laptop_second s ON f.id = s.id_bios_laptop WHERE f.link='.$DB->realEscapeStr($model).' AND f.manufacturer_id='.$DB->realEscapeStr($id_manufactur);
            $res=$DB->arrSQL($sql);
            if($res){
                $manufactur_name=$this->getManufacturer($id_manufactur);//Надпись типа Asus

                Def\Opt::$title='BIOS '.$manufactur_name.' '.$model.' - Скачать БИОС для ноутбука '.$manufactur_name.' '.$model;
                Def\Opt::$description='БИОС для ноутбука. BIOS '.$manufactur_name.' '.$model.' - Скачать БИОС для ноутбука '.$manufactur_name.' '.$model.'. Сервисный центр «WinTeh». Ремонт компьютерной и офисной техники.';

                Def\Opt::$main_content.='<div class="fon_c"><h3><abbr title="Basic input/output system">BIOS</abbr> '.$manufactur_name.' '.$model.'</h3><br><h4 class="al ml">Скачать <abbr title="Базовая система ввода-вывода">БИОС</abbr> для ноутбука '.$manufactur_name.' '.$model.'</h4><br>';

                $Down=new WinDef\DownloadTable();
                foreach($res as $k=>$v){
                    $ses='';
                    Def\Opt::$main_content.='<div class="five"><p><b>Motherboard  -  '.($v['model_motherboard']==''?'не указана':$v['model_motherboard']).'</b></p></div>

<div class="five"><p>Rev  -  '.($v['rev_motherboard']==''?'не указана':$v['rev_motherboard']).'</p></div>

<div class="five"><p>Version <abbr title="Basic input/output system">BIOS</abbr>   -  '.($v['ver_bios']==''?'не указана':$v['ver_bios']).'</p></div>

<div class="five"><p>Примечание: '.($v['notes']==''?'отсутствует':$v['notes']).'</p></div>';



                    if($v['level']=1){$ses=$Down->genLinkDownload($v['download_table_id'],$v['download_table']);}

Def\Opt::$main_content.='<div class="five">

<span class="link" data-l="'.$v['level'].'" data-s="'.$ses.'" data-id="'.$v['download_table_id'].'" data-t="'.$v['download_table'].'" onclick="fountainG(this)">Скачать файл</span>



<div class="fountainG_loader">
    <div class="fountainG"></div>
    <div class="fountainG"></div>
    <div class="fountainG"></div>
    <div class="fountainG"></div>
    <div class="fountainG"></div>
    <div class="fountainG"></div>
    <div class="fountainG"></div>
    <div class="fountainG"></div>
</div>
</div>

<br><link rel="stylesheet" type="text/css" href="/fountainG.css">
<script type="application/javascript">
function fountainG(el){
    var mDiv=el.parentNode;
    mDiv.removeChild(el);
    var loader=mDiv.children[0];
    loader.style.display="block";
    
    var interval;
    
    if(el.dataset.s==""){
        alert("error");
        
        
    }else{
        if(el.dataset.l==1){
            interval=2000;
        }else if(el.dataset.l==2){
            alert("not err 2");
            interval=2000;
        }else interval=3500;
        
        setTimeout(getDownload,interval,mDiv,el.dataset.id,el.dataset.t,el.dataset.s);
    }

}
function getDownload(mDiv,id,t,ses){
            mDiv.removeChild(mDiv.children[0]);
            var win =window.open(my_protocol+"//"+my_host+"/download.php?id="+id+"&t="+t+"&ses="+ses);
            if(!win){alert("Закачка залокирована браузером!");}
}



</script>

';

                    Def\Start::$start['AdminCook']=new \lib\user\User();

                    if(!Def\Start::$start['AdminCook']->loginAdmin()){/*Def\Route::$module404=true;*/}
                    else{
                        Def\Opt::$main_content.='download_table  -  '.$v['download_table'];
                        Def\Opt::$main_content.='download_table_id  -  '.$v['download_table_id'].'<br>';
                        Def\Opt::$main_content.='level  -  '.$v['level'].'<br>';

                    }

                }


            }else{
                Def\Opt::$main_content.='XYZ';
            }

            Def\Opt::$main_content.='</div>';


        }else Def\Route::$module404=true;
    }

}