<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 13.09.2019
 * Time: 20:57
 */
namespace lib\Def;
/*
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);*/

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('smoke');//Def opt
?>


<!doctype html>
<html lang="<?=$Opt::$lang?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Александр Баранов">
    <meta name="copyright" lang="<?=$Opt::$lang?>" content="MobileSmoke">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">

    <!--<link rel="shortcut icon" href="/img/site/ico.png" type="image/png">-->

    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/frame.css">
    <link rel="stylesheet" type="text/css" href="/css/color.css">





    <!--<script async src="/js/slider.php"></script>
    <script async src="/js/burger.php"></script>
    <script async src="/js/scroll.php"></script>



    <script async src="/js/common_sota_v1_0.js"></script>-->

    <?=$Opt::$jscript.$Opt::$css.'<meta name="description" content="'.$Opt::$description.'"><title>'.$Opt::$title.'</title>';?>


</head>
<body><header>
    <div class="header rel">
        <div class="headertop rel">

            <div class="maxw">
                <div id="topcontact" class="h_field">
                    <div class="dwf">
                        <div id="clock">
                            <div class="fl clock mt"></div>
                            <div class="fr five_">
                                <div class="ac"><span class="grey">пн-пт:</span> 10:00-18:00</div>
                                <div class="ac"><span class="grey">сб:</span> 10:00-14:00</div>
                                <div class="ac"><span class="grey">вс:</span> выходной</div>
                            </div><div class="cl"></div>
                        </div>
                        <div>
                            <div class="fl tel mt"></div>
                            <div class="fr five_">
                                <div class="ac mb">Наши контакты:</div>
                                <div><span class="grey telcountry">+38</span>(097) 523-77-87</div>
                                <div><span class="grey telcountry">+38</span>(066) 911-84-44</div>
                            </div><div class="cl"></div>
                        </div>
                        <div id="adres">
                            <div class="fl adres mt"></div>
                            <div class="fr five_">
                                <div class="ac mb">Наш адрес:</div>
                                <div class="ac">г. Мариуполь</div>
                                <div>пр-т Строителей, 39</div>
                            </div><div class="cl"></div>
                        </div>
                    </div>
                </div><div class="cl"></div>

            </div>



            <!--<div id="headcontact" class="maxw five_ headerimg">
                <div id="logo"><a href="/"><img src="/img/site/dbpic.php?i=logo&ep=1"></a></div>
                <div id="logoname" class="h_field ac"><h1 class="monofont">Сервисный центр «Cота плюс»</h1></div>

            </div>-->
        </div>
    </div><div class="cl"></div>
</header>





<div id="af">after footer</div>
<footer>

    <div id="foot">

        <div id="copy" class="ac gt">Copyright &copy; <?=$Opt::$site;?>
            <br>2015<?php if (date('Y') > 2015) echo '-' . date('Y'); ?><br><br>Использование материалов сайта без
            разрешения правообладателя запрещено
        </div>
        <div class="cl"></div>
    </div>


    <div id="bf">
        <div id="up"> ^ Наверх</div>
    </div>
</footer>


</body></html>