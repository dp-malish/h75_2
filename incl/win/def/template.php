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




    function __construct(){
        parent::__construct();
        switch(Def\Opt::$lang){
            case'uk':Def\Opt::$lang='uk';break;
            default:Def\Opt::$lang='ru';
        }
    }
}