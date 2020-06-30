<?php
namespace incl\win\Def;
use lib\Def;

class Template extends Def\Language{

    static $service_name=[
        'ru'=>'Сервисный центр «Винтех»',
        'uk'=>'Сервісний центр «Вінтех»'];
    static $tel_top=[
        'ru'=>'Телефоны',
        'uk'=>'Телефони'];
    static $address_top=[
        'ru'=>'Наш адрес',
        'uk'=>'Наша адреса'];
    static $city_top=[
        'ru'=>'г. Мариуполь',
        'uk'=>'м. Маріуполь'];
    static $address_street_top=[
        'ru'=>'пр. Строителей',
        'uk'=>'пр. Будівельників'];
    static $mode_of_operation_top=[
        'ru'=>'Режим работы',
        'uk'=>'Режим роботи'];
    static $mode_of_operation_top_day=[
        'ru'=>'пн-пт',
        'uk'=>'пн-пт'];
    static $mode_of_operation_top_day_h=[
        'ru'=>'сб',
        'uk'=>'сб'];
    //***************footer
    static $service_name_foot=[
        'ru'=>'сервисный центр «Винтех»',
        'uk'=>'сервісний центр «Вінтех»'];
    static $site_materials_foot=[
        'ru'=>'Использование материалов сайта без разрешения правообладателя запрещено',
        'uk'=>'Використання матеріалів сайту без згоди власника авторських прав заборонено'];





    function __construct(){
        parent::__construct();
        switch(Def\Opt::$lang){
            case'en':Def\Opt::$lang='en';break;
            case'uk':Def\Opt::$lang='uk';break;
            default:Def\Opt::$lang='ru';
        }
    }
}