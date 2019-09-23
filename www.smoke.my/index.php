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


    <link rel="stylesheet" type="text/css" href="/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/css/pulse_btn.css">

    <link rel="stylesheet" type="text/css" href="/css/menu_art.css">
    <link rel="stylesheet" type="text/css" href="/css/form.css">



    <script async src="/js/slider.php"></script>

    <script async src="/js/scroll.php"></script>

    <script async src="/js/common_v2.0.js"></script>

    <script async src="/js/call_back.js"></script>
    <script async src="/js/try.js"></script>


    <!--<script async src="/js/slider.php"></script>
    <script async src="/js/burger.php"></script>


    <script async src="/js/common_sota_v1_0.js"></script>-->

    <?=$Opt::$jscript.$Opt::$css.'<meta name="description" content="'.$Opt::$description.'"><title>'.$Opt::$title.'</title>';?>


</head>
<body>
<header>
    <div class="header rel">
        <div class="headertop rel">

            <div id="headcontact" class="maxw topcontact">
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
                                <div id="tel_k_pc_link"><a href="tel:+380684655519"><span class="grey telcountry">+38</span>(068) 465-55-19</a></div>
                                <div id="tel_v_pc_text"><span class="grey telcountry">+38</span>(050) 859-95-29</div>
                                <div id="tel_v_pc_link"><a href="tel:+380508599529"><span class="grey telcountry">+38</span>(050) 859-95-29</a></div>
                            </div><div class="cl"></div>
                        </div>
                        <div id="adres">
                            <div class="fl adres mt"></div>
                            <div class="fr five_">
                                <div class="ac mb">Наш склад:</div>
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
    <nav class="menu-art rel">
        <input type="checkbox" name="toggle" id="menu_art" class="toggleMenu">
        <label for="menu_art" class="toggleMenu"><i class="fa fa-bars"></i>Меню</label>
        <ul>
            <li><a href="/"><i class="fa fa-home"></i>Главная</a></li>
            <li>
                <input type="checkbox" name="toggle" class="toggleSubmenu" id="sub_m1">
                <a href="#" onclick="return false"><i class="fa fa-shopping-cart"></i>Кальяны</a>
                <label for="sub_m1" class="toggleSubmenu"><i class="fa"></i></label>
                <ul>
                    <li><a href="#">Кальян белый</a></li>
                    <li><a href="#">Кальян два</a></li>
                    <li><a href="#">Кальян MobileSmoke</a></li>
                    <li><a href="#">Быт. химия</a></li>
                    <li>
                        <input type="checkbox" name="toggle" class="toggleSubmenu" id="sub_m1-1">
                        <a href="#" onclick="return false">Одежда</a>
                        <label for="sub_m1-1" class="toggleSubmenu"><i class="fa"></i></label>
                        <ul>
                            <li><a href="#">Обувь</a></li>

                            <li><a href="#">Куртки</a></li>
                            <li><a href="#">Брюки</a></li>
                        </ul>
                    </li>
                    <li>
                        <input type="checkbox" name="toggle" class="toggleSubmenu" id="sub_m1-2">
                        <a href="#" onclick="return false">Электроника</a>
                        <label for="sub_m1-2" class="toggleSubmenu"><i class="fa"></i></label>
                        <ul>
                            <li><a href="#">Камеры</a></li>
                            <li><a href="#">Компьютеры</a></li>
                            <li>
                                <input type="checkbox" name="toggle" class="toggleSubmenu" id="sub_m1-2-1">
                                <a href="#" onclick="return false">Телефоны</a>
                                <label for="sub_m1-2-1" class="toggleSubmenu"><i class="fa"></i></label>
                                <ul>
                                    <li><a href="#">Samsung</a></li>
                                    <li><a href="#">Flf</a></li>
                                    <li><a href="#">Apple</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <input type="checkbox" name="toggle" class="toggleSubmenu" id="sub_m2">
                <a href="#" onclick="return false"><i class="fa fa-cogs"></i>Инструкции</a>
                <label for="sub_m2" class="toggleSubmenu"><i class="fa"></i></label>
                <ul>
                    <li><a href="#">Инструкции</a></li>
                    <li><a href="#">Услуга2</a></li>
                    <li><a href="#">Услуга3</a></li>
                    <li><a href="#">Услуга4</a></li>
                    <li><a href="#">Услуга5</a></li>
                </ul>
            </li>
            <li>
                <input type="checkbox" name="toggle" class="toggleSubmenu" id="sub_about_m2">
                <a href="#" onclick="return false"><i class="fa fa-th-list"></i>Клиенту</a>
                <label for="sub_about_m2" class="toggleSubmenu"><i class="fa"></i></label>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Оплата и доставка</a></li>
                    <li><a href="#">Программа лояльности</a></li>
                    <li><a href="#">Гарантия</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Кальяны оптом</a></li>

                </ul>





            <li><a href="#"><i class="fa fa-envelope-open"></i>Контакты</a></li>
        </ul>
    </nav>
</div>


<div class="maxw rel">
    <div class="l_col rel"><?=$Opt::$l_content_up.$Opt::$l_content?>

        <!--Профилактика<br>Услуги-->

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
                            <h3>Кальяны в любую точку Украины</h3>
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

    <div id="pulseBtn" class="pulse_btn">
        <div>
            <div class="pulse_btn_phone"><i class="fa fa-phone" aria-hidden="true"></i></div>
            <div class="pulse_btn_text">Кнопка связи</div>
        </div>
    </div>

</footer>


<!--<div class="form">

    <div id="form-convas" class="form-convas">

            <form>
                <div><h3>Купить в один клик</h3></div>
                <div><p>Мы Вам перезвоним</p></div>
                <div class="form-input form-icon-men">
                    <input type="text" name="username" placeholder="Введите логин">
                </div>
                <div class="form-input form-icon-tel">
                    <input type="tel" name="tel" placeholder="Введите телефон" required>
                </div>
                <div class="form-input form-icon-pass">
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
                <input class="form-submit" type="submit" name="submit" value="Заказать"><br />
                <input class="form-submit" type="submit" name="submit" value="Перезвоните мне"><br />
                <a href="#">Восстановить пароль</a>
            </form>
            <div class="form-social">
                <i class="fa fa-vk" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>



    </div>
    <div class="closex">X</div>
</div>-->

</body></html>