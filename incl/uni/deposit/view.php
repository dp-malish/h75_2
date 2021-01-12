<?php

namespace incl\uni\Deposit;

use lib\Def as Def;
use incl\uni\Def as UniDef;

class View{

    function __construct(){





        Def\Opt::$main_content.=UniDef\OptUni::CURRENCY[0][0];

        $DB=new Def\SQLi();
        $res=$DB->arrSQL('SELECT id,bank,target,percent,currency,amount,date_opening,date_closing FROM deposit ORDER BY bank');

        $arrBank=[];
        if($res){
            foreach($res as $k => $v) {

                $arrBank[$v['id']]['bank'].=$v['bank'];
                $arrBank[$v['id']]['bank_txt'].=UniDef\OptUni::BANK[$v['bank']][1];
                $arrBank[$v['id']]['target'].=UniDef\OptUni::BANK_TARGET[$v['target']][1];
                $arrBank[$v['id']]['percent'].=$v['percent'];
                $arrBank[$v['id']]['currency'].=$v['currency'];
                $arrBank[$v['id']]['amount'].=$v['amount'];
                $arrBank[$v['id']]['amount_txt'].= ($v['amount']/100).UniDef\OptUni::CURRENCY[$v['currency']][0];

                //доход = сумма/100*процент
                $arrBank[$v['id']]['income'].=$v['amount']/100*$v['percent'];
                //прибыль = доход минус 20%
                $arrBank[$v['id']]['profit'].=$arrBank[$v['id']]['income']-($arrBank[$v['id']]['income']*0.2);

            }
        }
        /* if ($res) {

             Def\Opt::$main_content .='<table border="1" align="center"><tr><td>Банк</td><td>Назначение</td><td>Процент</td><td colspan="2">Сумма</td>

             <td colspan="2">Доход</td><td colspan="2">Прибыль</td></tr>';

             foreach ($res as $k => $v) {
                 Def\Opt::$main_content.='<tr>';
                 Def\Opt::$main_content.='<td>'.UniDef\OptUni::BANK[$v['bank']][1] . '</td>';
                 Def\Opt::$main_content.='<td>'.UniDef\OptUni::BANK_TARGET[$v['target']][1].'</td>';

                 Def\Opt::$main_content.='<td>'.$v['percent'].'</td>';
                 $arrBank[].=$v['bank'];
                 if($v['currency']==0){
                     Def\Opt::$main_content.='<td>'.($v['amount']/100).UniDef\OptUni::CURRENCY[$v['currency']][0].'</td><td></td>';
                     Def\Opt::$main_content.='<td>'.(($v['amount']*0.01*$v['percent'])-(1)).UniDef\OptUni::CURRENCY[$v['currency']][0].'</td><td></td>';
                 }else{
                     Def\Opt::$main_content.='<td></td><td>'.($v['amount']/100).UniDef\OptUni::CURRENCY[$v['currency']][0].'</td>';
                     Def\Opt::$main_content.='<td></td><td>'.($v['amount']*0.01*$v['percent']).UniDef\OptUni::CURRENCY[$v['currency']][0].'</td>';
                 }


                 //Def\Opt::$main_content.='Валюта - '.UniDef\OptUni::CURRENCY[$v['currency']][0]. '<br>';

                 Def\Opt::$main_content .='</tr>';
             }
             Def\Opt::$main_content .='</table>';


             Def\Opt::$main_content.=UniDef\OptUni::BANK[$v['bank']][0];




         }*/

        var_dump($arrBank);





    }


public function Info(){


}


}