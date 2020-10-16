<?php
namespace incl\burger\Def;
use lib\Def;

class Template extends Def\Language{

    static $service_name=[
        'ru'=>'Барин Бургер',
        'uk'=>'Барін Бургер'];

    static $author=[
        'ru'=>'Александр Баранов',
        'uk'=>'Олександр Баранов',
    ];

    static $city_top=[
        'ru'=>'г. Мариуполь',
        'uk'=>'м. Маріуполь'];


    static $address_top=[
        'ru'=>'Наш адрес',
        'uk'=>'Наша адреса'];




    //***************footer

    static $site_materials_foot=[
        'ru'=>'Использование материалов сайта без разрешения правообладателя запрещено',
        'uk'=>'Використання матеріалів сайту без згоди власника авторських прав заборонено',
        'en'=>'Using the site materials without the permission of the copyright holder is prohibited'];





    function __construct($lngDB=''){
        parent::__construct($lngDB='');
        if($lngDB==''){
            switch(Def\Opt::$lang){
                //case'en':Def\Opt::$lang='en';break;
                case'uk':Def\Opt::$lang='uk';break;
                case'ru':Def\Opt::$lang='ru';break;
                default:Def\Opt::$lang='ru';Def\Cookie::setCookie('lng',Def\Opt::$lang);
            }
        }
    }
}