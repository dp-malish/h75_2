<?php
namespace incl\win\Def;
use lib\Def;

class Template extends Def\Language{

    static $service_name=[
        'ru'=>'Сервисный центр «Винтех»',
        'uk'=>'Сервісний центр «Вінтех»',
        'en'=>'Service center  «WinTeh»'];
    static $tel_top=[
        'ru'=>'Телефоны',
        'uk'=>'Телефони',
        'en'=>'Phones'];
    static $address_top=[
        'ru'=>'Наш адрес',
        'uk'=>'Наша адреса',
        'en'=>'Our address'];
    static $city_top=[
        'ru'=>'г. Мариуполь',
        'uk'=>'м. Маріуполь',
        'en'=>'Mariupol city'];
    static $address_street_top=[
        'ru'=>'пр. Строителей',
        'uk'=>'пр. Будівельників',
        'en'=>'Builders Ave'];
    static $mode_of_operation_top=[
        'ru'=>'Режим работы',
        'uk'=>'Режим роботи',
        'en'=>'Mode of operation'];
    static $mode_of_operation_top_day=[
        'ru'=>'пн-пт',
        'uk'=>'пн-пт',
        'en'=>'mo-fr'];
    static $mode_of_operation_top_day_h=[
        'ru'=>'сб',
        'uk'=>'сб',
        'en'=>'sa'];


    //***************footer
    static $service_name_foot=[
        'ru'=>'сервисный центр «Винтех»',
        'uk'=>'сервісний центр «Вінтех»',
        'en'=>'Service center  «WinTeh»'];
    static $site_materials_foot=[
        'ru'=>'Использование материалов сайта без разрешения правообладателя запрещено',
        'uk'=>'Використання матеріалів сайту без згоди власника авторських прав заборонено',
        'en'=>'Using the site materials without the permission of the copyright holder is prohibited'];





    function __construct(){
        parent::__construct();
        switch(Def\Opt::$lang){
            case'en':Def\Opt::$lang='en';break;
            case'uk':Def\Opt::$lang='uk';break;
            default:Def\Opt::$lang='ru';
        }
    }
}