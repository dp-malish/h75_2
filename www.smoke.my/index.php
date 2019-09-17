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
    <link rel="stylesheet" type="text/css" href="/css/slider.css">
    <link rel="stylesheet" type="text/css" href="/css/dws_pic.css">



    <script async src="/js/slider.php"></script>

    <!--<script async src="/js/slider.php"></script>
    <script async src="/js/burger.php"></script>
    <script async src="/js/scroll.php"></script>



    <script async src="/js/common_sota_v1_0.js"></script>-->

    <?=$Opt::$jscript.$Opt::$css.'<meta name="description" content="'.$Opt::$description.'"><title>'.$Opt::$title.'</title>';?>


</head>
<body>
<header>
    <div class="header rel">
        <div class="headertop rel">

            <div class="maxw topcontact">
                <div class="h_field">
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
                                <div><span class="grey telcountry">+38</span>(068) 465-55-19</div>
                                <div><span class="grey telcountry">+38</span>(050) 859-95-29</div>
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
                </div>
                <div class="cl"></div>
            </div>

            <div class="maxw rel ">
                <div id="logo"><a href="/" title="Mobile Smoke - кальяны в Украине"><img src="/img/site/dbpic.php?i=logo&ep=1" alt="Mobile Smoke - кальяны в Украине"></a></div>

                <div id="order" class="h_field">
                    <div id="fast_order">

                        <div class="call_back ac">
                            <span class="">Обратный звонок</span>


                        </div>


                    </div>
                    <div id="full_order">

                        корзина
                    </div>
                    <div class="cl"></div>
                </div>

                <div class="cl"></div>
            </div><div class="cl"></div>

        </div>
    </div><div class="cl"></div>

    <div class="five five_"></div>

    <div class="headercen rel">
        <div class="maxw rel">
            <div id="main_slider" class="rel">
                <img src="/img/site/slider/dbpic.php?i=Hookah_white&ep=1" alt="Кальян в Украине">
                <img src="/img/site/slider/dbpic.php?i=Hookah_black&ep=1" alt="Кальян в Украине">
                <img src="/img/site/slider/dbpic.php?i=Hookah_green&ep=1" alt="Кальян в Украине">
                <img src="/img/site/slider/dbpic.php?i=Hookah&ep=1" alt="Кальян в Украине">
                <div></div>
                <span id="btnSlider"><button type="button" value="0">&nbsp;</button><button type="button" value="1">&nbsp;</button><button type="button" value="2">&nbsp;</button><button type="button" value="3">&nbsp;</button></span>
            </div>
        </div>
    </div>
</header>


<div>
    тут
</div>


<div class="maxw rel">

    <div class="dws-wrapper">
        <a href="#">
            <img src="/img/hookah/hookah.jpg" alt="Кальян в Украине">
            <div class="dws-text">
                <h3>Эффект при наведении в CSS3</h3>
                <p>При помощи CSS3 можно творить свою магию. Следи за нами и подписывайся на канал DWS TV</p>
                <!--<a href="#">Подробнее</a>-->
            </div>
        </a>
    </div>


</div>

<div class="maxw">
    ckfqlth
</div>





<div class="maxw rel">
    <div class="l_col rel"><?=$Opt::$l_content_up.$Opt::$l_content?>

        Профилактика<br>Услуги

        <div class="cl"></div>
    </div>
    <div id="m_col" class="rel"><!--Пр кол-->
        <div class="r_col">
            <?=$Opt::$r_content_up.$Opt::$r_content?>

            <div class="cl"></div>
        </div><!--Центр кол-->

        <div id="c_col" class="rel">
            <main><?=$Opt::$main_content?></main>
            <div class="cl"></div>
        </div><!--Конец Центр кола-->
        <div class="cl"></div>
    </div><!--end m_col-->
    <div class="cl"></div>
</div>


<div id="af">after footer</div>
<footer>

    <div id="foot" class="maxw">

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