<body><header>
    <div id="bh">
        <div class="maxw">
            <div id="bhlocation"><span class="location">  Мариуполь</span></div>
            <div id="bhtimew">Работаем с 08:00 до 19:00</div>
            <div id="bhmenu">
                <a href="/">Доставка</a><a href="/">Контакты</a>
            </div>
            <div id="bhtel">
                <a href="tel:+380963035583"> +38(096)303-55-83</a>
            </div>
            <div class="lng_btn">
                <!--<span id="lng_en_btn" class="lng_en" title="english" data-lng="en" onClick="lngBtn(this);"></span>-->
                <span id="lng_ru_btn" class="lng_ru" title="русский" data-lng="ru" onClick="lngBtn(this);"></span>
                <span id="lng_uk_btn" class="lng_uk" title="українська" data-lng="uk" onClick="lngBtn(this);"></span>
                <div class="cl"></div>
                <script type="application/javascript">
                    function lngBtn(el){
                        document.cookie="lng="+el.dataset.lng+";domain=."+document.location.host;
                        //location.href='/';
                    }
                </script>
            </div>
            <div class="cl"></div>
        </div>
    </div>
    <div id="headerback"></div>
    <div id="header">
        <div class="maxw rel">
            <div id="logo"><a href="/"><img src="img/site/dbpic.php?i=logo&ep=1" alt="Barin Burger"></a></div>
            <nav>
                <div id="burgermenu" class="rel">
                    <div id="burger_mob">
                        <div id="burger" class="burger">
                            <div id="burger_ln_1" class="burger_line"></div>
                            <div id="burger_ln_c" class="burger_line"></div>
                            <div id="burger_ln_3" class="burger_line"></div>
                        </div>

                        <div id="burger_mob_1" class="burger_mob">
                            <ul>
                                <li><a href="#burger_part" onclick="burgerClickClose();">Бургеры</a></li>
                                <li><a href="#pizza_part" onclick="burgerClickClose();">Пиццы</a></li>
                                <li><a href="/" onclick="burgerClickClose();">Нагитсы</a></li>
                                <li><a href="/" onclick="burgerClickClose();">Напитки</a></li>
                            </ul>
                        </div>

                    </div>

                    <div id="burger_pc">
                        <ul>
                            <li><a href="/#burger_part">Бургеры</a></li>
                            <li><a href="/#pizza_part">Пиццы</a></li>
                            <li><a href="/">Нагитсы</a></li>
                            <li><a href="/">Напитки</a></li>
                        </ul>
                    </div>


                    <div class="cl"></div>
                </div>
            </nav>

            <div class="cl"></div>
        </div>
    </div>
    <div class="cl"></div>
</header>