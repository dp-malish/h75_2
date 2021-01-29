<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 10.01.2021
 * Time: 14:33
 */

namespace incl\uni\Def;

//use incl\uni\

class OptUni{
    const CURRENCY=[
        ['$','usd','дол'],
        ['₴','hrn','грн']
    ];
    const BANK=[
        ['ПриватБанк','Приват'],
        ['Первый Украинский','ПУМБ'],
        ['А-Банк','А'],
        ['Альфа-Банк','Альфа']
    ];
    const BANK_TARGET=[
        ['Магнит','Маг'],
        ['Актив','Акт'],
        ['СПД','СПД'],
        ['Квартира','Кв'],
        ['Авто','Авт']
    ];
    //*************** store
    //****мнклура заголовок
    const HEADING=[
        ['Заголовок',''],
        ['Заголовок 2','']
    ];
    const CATEGORY=[
        ['Категория',''],
        ['Категория 2','']
    ];
    const MANUFACTURER=[
        ['NoName'],
        ['Asus']
    ];
    const PROVIDER=[
        ['MobiMag'],
        ['Microtron']
    ];


}