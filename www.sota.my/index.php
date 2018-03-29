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




    <!--<script async src="/js/common.php?v=2"></script>
    <script async src="/js/slider.php?v=2"></script>
    <script async src="/js/scroll.php?id=1"></script>-->


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


        <script type="text/javascript">

            window.onscroll=function(){
                if(window.pageYOffset>0&&window.pageYOffset<310&&document.body.clientWidth>800){
                    document.getElementById('headcontact').style.position="fixed";
                    document.getElementById('headcontact').style.width="100%";
                    document.getElementById('headcontact').style.margin="auto";
                    document.getElementById('headcontact').style.left=0;
                    document.getElementById('headcontact').style.right=0;
                }else{
                    document.getElementById('headcontact').style.position="relative";
                }
                //**** burger
                burger(468);
            };
            function burger(posY) {
                //**** burger
                if(window.pageYOffset>=posY/*&&document.body.clientWidth>800*/){
                    //alert(window.pageYOffset);
                    document.getElementById('burger').style.position="fixed";
                    document.getElementById('burger').style.float="null";
                    /*document.getElementById('burger').style.width="100%";
                    document.getElementById('burger').style.margin="auto";*/
                    document.getElementById('burger').style.left=0;
                    document.getElementById('burger').style.top=0;

                }else{
                    document.getElementById('burger').style.position="relative";
                    document.getElementById('burger').style.float="left";
                    /* document.getElementById('headcontact').style.position="relative";*/
                }
            }

        </script>



        <div class="headercen rel">
            <div class="maxw rel">
                <div id="main_slider" class="rel">


                    <img src="/img/site/slider/site.png" alt="Сделать сайт в Мариуполе">
                    <img src="/img/site/main_slider/jpg.php?i=img2" alt="Психология">
                    <img src="/img/site/main_slider/jpg.php?i=img3" alt="Лайфхаки">
                    <img src="/img/site/main_slider/jpg.php?i=img4" alt="Личности">
                    <div></div>
                    <span id="btnSlider"><button type="button" value="0">&nbsp;</button><button type="button" value="1">&nbsp;</button><button
                                type="button" value="2">&nbsp;</button><button type="button"
                                                                               value="3">&nbsp;</button></span>
                </div>
            </div>
        </div>

        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->


        <div class="headerbot maxw rel">

            <div class="main_menu rel">
                <div id="burger" class="burger rel">
                    <div class="rel red">
                        <div class="burger_line"></div>
                        <div class="burger_line"></div>
                        <div class="burger_line"></div>
                    </div>
                    <div id="burger_menu" class="burger_canvas"></div>
                </div>
                <div id="div23" class="main_menu_pc green">f545655645465456</div>
                <div class="cl"></div>
            </div>

            <script type="text/javascript">

                document.getElementById("burger").addEventListener('click', function() {

                    if(document.getElementById('burger_menu').clientHeight<1){
                        burger(0);
                        var myHeight = window.innerHeight;
                        //alert(myHeight);
                        document.getElementById('burger_menu').style.height=myHeight+"px";
                    document.getElementById('burger_menu').style.width="90px";
                    }else{
                        document.getElementById('burger_menu').style.height=0;
                        document.getElementById('burger_menu').style.width=0;
                    }
                    //alert(1);
                });
            </script>



            <div class="overlay">
                <nav class="overlayMenu">
                    <ul role="menu">
                        <li><a href="#" role="menuitem">Parity</a></li>
                        <li><a href="#" role="menuitem">Abstract</a></li>
                        <li><a href="#" role="menuitem">Educated</a></li>
                        <li><a href="#" role="menuitem">Decorum</a></li>
                        <li><a href="#" role="menuitem">Tenuous</a></li>
                    </ul>
                </nav>
            </div>







        </div>
    </div>
</header>




<div class="maxw">
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
<p>1</p>
<p>1</p>
</div>
<script type="text/javascript">
    //alert(document.getElementById("div23").clientHeight+' высота  '+document.getElementById("getsizehed").clientWidth);
</script>
</body></html>