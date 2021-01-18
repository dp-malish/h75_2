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
                $arrBank[$v['id']]['income'].=round(($v['amount']/100*$v['percent'])/100,2);
                //прибыль = доход минус 20% и округлим
                $arrBank[$v['id']]['profit'].=round($arrBank[$v['id']]['income']-($arrBank[$v['id']]['income']*0.2),2);

                //доход мес (30 дней) = (%/365*30)*сумма/100
                $arrBank[$v['id']]['income_month'].=($v['percent']/365*30)*$v['amount']/100;
                //прибыль мес доход мес-(доход мес*0,2)
                $arrBank[$v['id']]['profit_month'].=round($arrBank[$v['id']]['income_month']-($arrBank[$v['id']]['income_month']*0.2),2);
                $arrBank[$v['id']]['date_closing'].=$v['date_closing'];

            }
            $arrBankTotal=[];
            foreach ($arrBank as $val){
                if($val['currency']==0){
                    $arrBankTotal[$val['bank']]['usd']+=$val['amount'];
                    $arrBankTotal[$val['bank']]['usd_count']++;
                    $arrBankTotal[$val['bank']]['usd_profit']+=$val['profit'];
                    $arrBankTotal[$val['bank']]['usd_profit_month']+=$val['profit_month'];
                }elseif($val['currency']==1){
                    $arrBankTotal[$val['bank']]['hrn'] += $val['amount'];
                    $arrBankTotal[$val['bank']]['hrn_count']++;
                    $arrBankTotal[$val['bank']]['hrn_profit']+=$val['profit'];
                    $arrBankTotal[$val['bank']]['hrn_profit_month']+=$val['profit_month'];
                }
                echo $val['date_closing'] . '<br>';
            }
        }
        Def\Opt::$main_content .='<table border="1" align="center"><tr>
<td rowspan="2">Банк</td>
<td rowspan="2">Назначение</td>
<td rowspan="2">Процент</td>
<td colspan="2">Сумма</td>
<td colspan="2">Доход</td>
<td colspan="2">Прибыль</td>
<td rowspan="2">Срок</td>
<td rowspan="2">'.UniDef\OptUni::CURRENCY[0][0].'</td>
<td rowspan="2">'.UniDef\OptUni::CURRENCY[1][0].'</td></tr>';
        Def\Opt::$main_content .='<td>Дол</td><td>Грн</td><td>Дол</td><td>Грн</td>
<td>Дол</td><td>Грн</td>';

        $flag=-1;
        $flag2=-1;
           foreach($arrBank as $k => $vk){

            Def\Opt::$main_content.='<tr>';

            if($flag!=$vk['bank']){
                $rowspan=' rowspan="'.($arrBankTotal[$vk['bank']]['usd_count']+$arrBankTotal[$vk['bank']]['hrn_count']).'"';
                $flag=$vk['bank'];
                Def\Opt::$main_content.='<td'.$rowspan.'>'.$vk['bank_txt'].'</td>';
            }
            Def\Opt::$main_content.='<td>'.$vk['target'].'</td>';
            Def\Opt::$main_content.='<td>'.$vk['percent'].'</td>';
               if($vk['currency']==0){
                   Def\Opt::$main_content.='<td>'.$vk['amount_txt'].'</td><td></td>';
                   Def\Opt::$main_content.='<td>'.$vk['income'].UniDef\OptUni::CURRENCY[$v['currency']][0].'</td><td></td>';
                   Def\Opt::$main_content.='<td>'.$vk['profit'].UniDef\OptUni::CURRENCY[$v['currency']][0].'</td><td></td>';
               }else{
                   Def\Opt::$main_content.='<td></td><td>'.$vk['amount_txt'].'</td>';
                   Def\Opt::$main_content.='<td></td><td>'.$vk['income'].UniDef\OptUni::CURRENCY[$v['currency']][0].'</td>';
                   Def\Opt::$main_content.='<td></td><td>'.$vk['profit'].UniDef\OptUni::CURRENCY[$v['currency']][0].'</td>';
               }
               Def\Opt::$main_content.='<td>'.$vk['date_closing'].'</td>';

               if($flag2!=$vk['bank']){
                   $rowspan=' rowspan="'.($arrBankTotal[$vk['bank']]['usd_count']+$arrBankTotal[$vk['bank']]['hrn_count']).'"';
                   $flag2=$vk['bank'];
                   Def\Opt::$main_content.='<td'.$rowspan.'>'.($arrBankTotal[$vk['bank']]['usd']/100).'</td>';
                   Def\Opt::$main_content.='<td'.$rowspan.'>'.($arrBankTotal[$vk['bank']]['hrn']/100).'</td>';
               }


            Def\Opt::$main_content.='</tr>';
        }
        Def\Opt::$main_content .='</table>';

        var_dump($arrBank);
        echo '<br><br>';
        print_r($arrBankTotal);

    }
public function Info(){}
}