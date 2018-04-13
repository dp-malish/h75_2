<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 02.04.2018
 * Time: 23:28
 */

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


?>

<!doctype html><html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Александр Баранов">
    <link rel="author" href="https://plus.google.com/105678225473161794317">
    <meta name="copyright" lang="ru" content="Stroymans">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">

    <!--<link rel="shortcut icon" href="/img/site/ico.png" type="image/png">-->


    <link rel="stylesheet" type="text/css" href="/css/frame.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/z-index.css">

    <link rel="stylesheet" type="text/css" href="/css/common.css">

    <link rel="stylesheet" type="text/css" href="/css/color.css">

    <link rel="stylesheet" type="text/css" href="/css/menu.css">

    <!---->




    <script async src="/js/burger_menu.js"></script>

    <!--<script async src="/js/common.php?v=2"></script>
    <script async src="/js/slider.php?v=2"></script>
    <script async src="/js/scroll.php?id=1"></script>-->

</head><body>

<header>
    <div id="header" class="maxw rel">
        <div class="header_bbb">
            <div class="header_back">
                <img src="/img/site/pic.php?i=head">
            </div>
            <div class="headerbot">
                <div id="logo" class="fl rel">
                    <a href="/"><img src="/img/site/pic.php?i=logo&ep=1" alt="Stroymans" title="Stroymans"></a>
                    <div class="cl"></div>
                </div>
                <div class="h_field">
                    <div id="top_tel">
                        <div id="top_tel_pic" class="fl"></div>
                        <div id="top_tel_text" class="fr">
                            <div>
                                <span class="grey">+38</span>(067) 621 01 86
                            </div>
                            <div>
                                <span class="grey">+38</span>(097) 778 60 63
                            </div>
                        </div>
                        <div class="cl"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="maxw rel">
    <div class="main_menu rel">
        <div id="burger" class="burger rel">
            <div>
                <div class="burger_line"></div><div class="burger_line"></div><div class="burger_line"></div>
            </div>
            <div id="burger_menu" class="burger_canvas">
                <nav>
                    <ul class="top_menu_m">
                        <li><a href="/">Главная</a></li>
                        <li><a href="">О нас</a>
                        <li><a href="">Контакты</a></li>
                        <li><a href="">Статьи</a></li>
                        <li><a href="">Цены</a></li>
                        <li><a href="">Галерея</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="main_menu_pc">
            <nav>
                <ul class="top_menu_pc">
                    <li><a href="/">Главная</a></li>
                    <li><a href="" class="top_menu_pc_down">О нас</a>
                        <ul class="top_menu_pc_submenu">
                            <li><a href="">Контакты</a></li>
                            <li><a href="">Партнёры</a></li>
                        </ul>
                    </li>
                    <li><a href="">Статьи</a></li>
                    <li><a href="">Цены</a></li>
                    <li><a href="">Галерея</a></li>
                </ul>
            </nav>

        </div>
        <div class="cl"></div>
    </div>
</div>



<div class="maxw rel">
    <div class="l_col rel">

        <div class="l_menu">
            <div class="l_menu_title">Ремонт квартир</div>
            <nav>
                <ul>
                    <li><a href="">Косметический ремонт</a></li>
                    <li><a href="">Капитальный ремонт</a></li>
                    <li><a href="">Комплексный ремонт</a></li>
                </ul>
            </nav>
        </div>

        <div class="l_menu">
            <div class="l_menu_title">Ремонт квартир и домов</div>
            <nav>
                <ul>
                    <li><a href="">Демонтажные работы</a></li>
                    <li><a href="">Кладка стен / перегородок</a></li>
                    <li><a href="">Малярные работы</a></li>
                    <li><a href="">Монтаж гипсокартона</a></li>
                    <li><a href="">и т.д.</a></li>
                </ul>
            </nav>
        </div>


        <div class="cl"></div>
    </div>
    <div class="m_col rel">
        <div class="r_col rel">
            <div class="r_menu">
                <nav>

                <div class="r_menu_btn">
                    <a href="">
                        <img src="/img/site/pic.php?i=krovlya" alt="Кровельные работы" title="Кровельные работы">
                        <div class="down_title">Кровельные работы</div>
                    </a>
                </div>

                <div class="r_menu_btn">
                    <a href="">
                        <img src="/img/site/pic.php?i=fasad" alt="Фасадные работы" title="Фасадные работы">
                        <div class="down_title">Фасадные работы</div>
                    </a>
                </div>

                <div class="r_menu_btn">
                    <a href="">
                        <img src="/img/site/pic.php?i=stroy" alt="Строительные работы" title="Строительные работы">
                        <div class="down_title">Строительные работы</div>
                    </a>
                </div>

                <div class="r_menu_btn">
                    <a href="">
                        <img src="/img/site/pic.php?i=otdelka" alt="Отделочные работы" title="Отделочные работы">
                        <div class="down_title">Отделочные работы</div>
                    </a>
                </div>

                <div class="r_menu_btn">
                    <a href="">
                        <img src="/img/site/pic.php?i=kompleks" alt="Комплексные работы" title="Комплексные работы">
                        <div class="down_title">Комплексные работы</div>
                    </a>
                </div>

                <div class="r_menu_btn">
                    <a href="">
                        <img src="/img/site/pic.php?i=doma" alt="Строительство домов" title="Строительство домов">
                        <div class="down_title">Строительство домов</div>
                    </a>
                </div>

                    <div class="r_menu_btn">
                        <a href="">
                            <img src="/img/site/pic.php?i=uteplenie" alt="Утепление фасадов" title="Утепление фасадов">
                            <div class="down_title">Утепление фасадов</div>
                        </a>
                    </div>

                </nav>
            </div>



        </div>
        <div class="c_col">
            <main>
                <h2>Пример</h2>
                <p>каор  ара вра   орп оарп оапо аовр парп равоп роарп оарвоп ра а павр ав пав апо аоп оа рповаопр оа поаврпоаорпарвправо рпоаврпорав ав рпав прваорпо арвпо раовр поавр поаоарвоп ра а павр ав пав апо аоп оа рповаопр оа поаврпоаорпарвправо рпоаврпорав ав рпав прваорпо арвпо раовр поавр поаоарвоп ра а павр ав пав апо аоп оа рповаопр оа поаврпоаорпарвправо рпоаврпорав ав рпав прваорпо арвпо раовр поавр поаоарвоп ра а павр ав пав апо аоп оа рповаопр оа поаврпоаорпарвправо рпоаврпорав ав рпав прваорпо арвпо раовр поавр поаоарвоп ра а павр ав пав апо аоп оа рповаопр оа поаврпоаорпарвправо рпоаврпорав ав рпав прваорпо арвпо раовр поавр поа</p>


            </main>
        </div>
        <div class="cl"></div>
    </div>
    <div class="cl"></div>
</div>


<div id="af"></div>
<footer>

    <div id="foot">

        <div id="copy" class="ac gt">Copyright &copy;<?= $site; ?>
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
