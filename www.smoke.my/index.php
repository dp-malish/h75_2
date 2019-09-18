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
    <link rel="stylesheet" type="text/css" href="/css/common.css">



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
                        <div id="tel">
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

                       <!-- корзина-->
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
            <main><?=$Opt::$main_content?>
                <h3>Кальян</h3>


                <p>Для современного человека понятие <strong>кальян</strong> – прибор для курения, способный охладить и отфильтровать вдыхаемый дым. Такое устойчивое восприятие индийского изобретения довольно быстро устоялась из-за популярности кальяна сначала среди мусульман, а затем к XIX веку он покорил Европу.</p>
                <p>Для визуального представления кальяна представьте: фильтр, похожий на шахту, на стенах которой оседают разные примеси; сосуд с различной жидкостью, которая осаждает до половины примесей, содержащихся в дыме. А уже в этот самый сосуд вставлена курительная чаша, соединённая с той самой шахтой, отвод которой погружен в воду. Ну и непосредственна вторая трубка, расположенная выше уровня для вдыхания дыма.</p>
                <p>Кальян часто курят в дружеских компаниях и для приятного время провождения он становиться незаменимым атрибутом гостеприимных хозяев мероприятия. Mobile Smoke – это отличный вариант кальяна. Походный дизайн кальяна весьма удобен в походных условиях эксплуатации, а его невероятный яркий вкус подарят незабываемые эмоции от применения.</p>
                <p><strong>Кальян</strong> – это культура, история и современный тренд. Присоединяясь к тренду, Вы становитесь счастливым обладателя незабываемых ощущений.</p>

                <div class="dws-wrapper">
                    <a href="#">
                        <img src="/img/hookah/hookah.jpg" alt="Кальян в Украине">
                        <div class="dws-text">
                            <h3>Кальян в Украине</h3>
                            <p>Наши кальяны творят свою магию. Следите за новинками и подписывайтесь на канал.</p>

                        </div>
                    </a>
                </div>

                <h3>Комплектация</h3>
                <ul>
                    <li>Корпус Easysmoke (Jet Black);</li>
                    <li>Силиконовая чаша;</li>
                    <li>Шланг и мундштук Easysmoke черного цвета;</li>
                    <li>Kaloud lotus (уточняйте цвет калауда при заказе);</li>
                    <li>Подсветка с пультом (три цвета: синий, красный, зеленый, пульсирующий);</li>
                    <li>Металлические щипцы.</li>
                </ul>
                <h3>Эмоции</h3>
                <p>Плоский кальян определенно выделяется из множества других однотипных вертикальных кальянов. Представьте удивление ваших друзей, когда вы предложите им попробовать кальян Easysmoke! Вас определенно заметят на вечеринке, и вы всегда будете в центре внимания.</p>

                <h3>Удобство и прочность</h3>
                <p>Кальян Easysmoke легко поместится в любой рюкзак - его вес меньше килограмма! Кальян Easysmoke прочно стоит на столе в отличие от классических вертикальных кальянов, которые легко разбить!</p>

                <h3>Уникальный дизайн</h3>
                <p>Уникальный горизонтальный дизайн Easysmoke определенно привлекает внимание. В разработке дизайна кальяна принимали участие ведущие иностранные кальянные мастера. А встроенная подсветка добавит ещё больше внимания к вам!</p>

                <div class="dws-wrapper">
                    <a href="#">
                        <img src="/img/hookah/hookah.jpg" alt="Кальян в Украине">
                        <div class="dws-text">
                            <h3>Оптимальный дизайн</h3>
                            <p>Наши кальяны творят свою магию. Следите за новинками и подписывайтесь на канал.</p>

                        </div>
                    </a>
                </div>

                <h3>Высококачественные материалы</h3>
                <p>При производстве кальянов Easysmoke используются только высококачественные и высокотехнологичные материалы, безопасные для здоровья. Полированный акрил цвета JET BLACK выглядит безупречно.</p>

                <h3>Мобильность</h3>
                <p>Если вы любитель активного отдыха, то походный кальян Easy Smoke станет его верным спутником. Что может скрасить отдых на природе лучше, чем сладкий густой дым? Кальян Easy Smoke просто создан для походов и путешествий.</p>

            </main>
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