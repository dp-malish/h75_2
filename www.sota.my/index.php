<?php
/*$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);*/

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Александр Баранов">
    <link rel="author" href="https://plus.google.com/105678225473161794317">
    <meta name="copyright" lang="ru" content="Taimod">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">

    <!--<link rel="shortcut icon" href="/img/site/ico.png" type="image/png">-->


    <link rel="stylesheet" type="text/css" href="/css/frame.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/z-index.css">

    <link rel="stylesheet" type="text/css" href="/css/slider.css">

    <link rel="stylesheet" type="text/css" href="/css/color.css">
    <link rel="stylesheet" type="text/css" href="/css/common.css">


    <link rel="stylesheet" type="text/css" href="/css/menu.css">


    <script async src="/js/slider.js"></script>
    <script async src="/js/burger_menu.js"></script>
    <script async type="text/javascript" src="/js/scroll.js"></script>



    <!--<script async src="/js/common.php?v=2"></script>-->


</head>

<body>
<header>
    <div class="header rel">
        <div class="headertop rel" id="getsizehed">
            <div id="headcontact" class="maxw five_ headerimg">
                <div id="logo">
                    <a href="/">
                        <img src="/img/site/logo.png">
                    </a>
                </div>

                <div id="logoname" class="h_field ac">
                    <h1>Сервисный центр «Cота плюс»</h1>
                </div>

                <div id="topcontact" class="h_field">

                    <div class="dwf">

                        <div id="clock">
                            <div class="fl clock mt"></div>
                            <div class="fr five_">
                                <div class="ac"><span class="grey">пн-пт:</span> 10:00-18:00</div>
                                <div class="ac"><span class="grey">сб:</span> 10:00-14:00</div>
                                <div class="ac"><span class="grey">вс:</span> выходной</div>
                            </div>
                            <div class="cl"></div>
                        </div>
                        <div>
                            <div class="fl tel mt"></div>
                            <div class="fr five_">
                                <div class="ac mb">Наши контакты:</div>
                                <div><span class="grey telcountry">+38</span>(097) 523-77-87</div>
                                <div><span class="grey telcountry">+38</span>(066) 911-84-44</div>
                            </div>
                            <div class="cl"></div>
                        </div>
                        <div id="adres">
                            <div class="fl adres mt"></div>
                            <div class="fr five_">
                                <div class="ac mb">Наш адрес:</div>
                                <div class="ac">г. Мариуполь</div>
                                <div>пр-т Строителей, 39</div>
                            </div>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>

                <div class="cl"></div>
            </div>

        </div>



        <div class="headercen rel">
            <div class="maxw rel">
                <div id="main_slider" class="rel">


                    <img src="/img/site/slider/servesniy_centor.png" alt="Сервисный центр Мариуполь">
                    <img src="/img/site/slider/site.png" alt="Сделать сайт в Мариуполе">
                    <img src="/img/site/slider/servesniy_centor.png" alt="Сервисный центр Мариуполь">
                    <img src="/img/site/slider/site.png" alt="Сделать сайт в Мариуполе">

                    <div></div>
                    <span id="btnSlider"><button type="button" value="0">&nbsp;</button><button type="button" value="1">&nbsp;</button><button
                                type="button" value="2">&nbsp;</button><button type="button" value="3">&nbsp;</button></span>
                </div>
            </div>
        </div>

        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->


        <div class="headerbot maxw rel">

            <div class="main_menu rel">
                <div id="burger" class="burger rel">
                    <div>
                        <div class="burger_line"></div><div class="burger_line"></div><div class="burger_line"></div>
                    </div>
                    <div id="burger_menu" class="burger_canvas">
                        <nav>
                            <ul class="top_menu_m">
                                <li><a href="#">Parity</a></li>
                                <li><a href="#">Abstract</a></li>
                                <li><a href="#">Educated</a></li>
                                <li><a href="#">Decorum</a></li>
                                <li><a href="#">Tenuous</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div id="main_menu_pc">
                    <nav>
                        <ul class="top_menu_pc">
                            <li><a href="/">Главная</a></li>

                            <li><a href="" class="top_menu_pc_down">Программы</a>
                                <ul class="top_menu_pc_submenu">
                                    <li><a href="">Category</a></li>
                                    <li><a href="">Author</a></li>
                                    <li><a href="">Archive</a></li>
                                    <li><a href="">Tags</a></li>
                                </ul>
                            </li>

                            <li><a href="" class="top_menu_pc_down">Ремонт</a>
                                <ul class="top_menu_pc_submenu">
                                    <li><a href="">Category</a></li>
                                    <li><a href="">Author</a></li>
                                    <li><a href="">Archive</a></li>
                                    <li><a href="">Tags</a></li>
                                </ul>
                            </li>

                            <li><a href="" class="top_menu_pc_down">Сайты</a>
                                <ul class="top_menu_pc_submenu">
                                    <li><a href="">Category</a></li>
                                    <li><a href="">Author</a></li>
                                    <li><a href="">Archive</a></li>
                                    <li><a href="">Tags</a></li>
                                </ul>
                            </li>
                            <li><a href="">Магазин</a></li>
                            <li><a href="">Контакты</a></li>
                        </ul>
                    </nav>

                </div>
                <div class="cl"></div>
            </div>













        </div>
    </div>
</header>

<div class="maxw rel">
    <div class="l_col rel">

        <div class="l_menu">
            <div class="l_menu_title">Математика</div>
            <nav>
                <ul>
                    <li><a href="/математика/соседи-числа/">Соседи числа</a></li>
                    <li><a href="/математика/сложение/">Сложение</a></li>
                    <li><a href="/математика/вычитание/">Вычитание</a></li>
                </ul>
            </nav>
        </div>


        Профилактика<br>
        Услуги

        <div class="cl"></div>
    </div>

    <div id="m_col" class="rel red"><!--Пр кол-->
        <div class="r_col">

            <div class="r_menu">
                <div class="r_menu_title">Правая математика</div>
                <nav>
                    <ul>
                        <li><a href="/математика/соседи-числа/">Соседи числа</a></li>
                        <li><a href="/математика/сложение/">Сложение</a></li>
                        <li><a href="/математика/вычитание/">Вычитание</a></li>
                    </ul>
                </nav>
            </div>


            Правая
            <div class="cl"></div>
        </div><!--Центр кол-->

        <div id="c_col" class="rel">
            <main>центр</main>
            <div class="cl"></div>
        </div><!--Конец Центр кола-->
        <div class="cl"></div>
    </div><!--end m_col-->
    <div class="cl"></div>
</div><!--end maxw-->

<div class="maxw">



<p>dfg fdg fg fd gdfghj 1 g fdg fg fd gdfghj 1 fdg fg fd gdfghj </p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
<p>1</p>
</div>
<script type="text/javascript">
    //alert(document.getElementById("div23").clientHeight+' высота  '+document.getElementById("getsizehed").clientWidth);
</script>
</body></html>