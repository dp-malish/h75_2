<?php
namespace incl\burger\Def;
use lib\Def;
use lib\Get as Get;

class Template extends Def\Language{

    static $service_name=[
        'ru'=>'Барин Бургер',
        'uk'=>'Барін Бургер'];
    static $author=[
        'ru'=>'Александр Баранов',
        'uk'=>'Олександр Баранов'];
    static $city_top=[
        'ru'=>'г. Мариуполь',
        'uk'=>'м. Маріуполь'];
    static $time_work_top=[
        'ru'=>'Работаем с',
        'uk'=>'Працюєм з'];
//*****************верхняя полоска меню
    static $m_t_dostavka=[
        'ru'=>'Доставка',
        'uk'=>'Доставка'];
    static $m_t_contact=[
        'ru'=>'Контакты',
        'uk'=>'Контакти'];
//*****************верхняя полоска меню конец
//*****************бургер меню
    static $m_b_burger=[
        'ru'=>'Бургеры',
        'uk'=>'Бургери'];
    static $m_b_pizza=[
        'ru'=>'Пиццы',
        'uk'=>'Піци'];
    static $m_b_nuggets=[
        'ru'=>'Наггетсы',
        'uk'=>'Нагетси'];
    static $m_b_beverages=[
        'ru'=>'Напитки',
        'uk'=>'Напої'];
//*****************бургер меню конец
//*****************Заголовки caption
    static $caption_burger=[
        'ru'=>'БУРГЕРЫ',
        'uk'=>'БУРГЕРИ'];
    static $caption_pizza=[
        'ru'=>'ПИЦЦА',
        'uk'=>'ПІЦА'];
    static $caption_nuggets=[
        'ru'=>'НАГГЕТСЫ',
        'uk'=>'НАГГЕТСИ'];
    static $caption_beverages=[
        'ru'=>'НАПИТКИ',
        'uk'=>'НАПОЇ'];
//*****************Заголовки caption конец








//***************footer
    static $site_materials_foot=[
        'ru'=>'Использование материалов сайта без разрешения правообладателя запрещено',
        'uk'=>'Використання матеріалів сайту без згоди власника авторських прав заборонено'];





    function __construct($lngDB=''){
        parent::__construct($lngDB='');
        /*if(Get\Get::issetGetArr()){

        }*/

        if($lngDB==''){
            switch(Def\Opt::$lang){
                //case'en':Def\Opt::$lang='en';break;
                case'uk':Def\Opt::$lang='uk';Def\Opt::$lang_alternate='ru';break;
                case'ru':Def\Opt::$lang='ru';Def\Opt::$lang_alternate='uk';break;
                default:Def\Opt::$lang='ru';Def\Opt::$lang_alternate='uk';Def\Cookie::setCookie('lng',Def\Opt::$lang);
            }
        }
    }




}