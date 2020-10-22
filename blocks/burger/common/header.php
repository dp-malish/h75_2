<body><header>
    <div id="bh">
        <div class="maxw">
            <div id="bhlocation"><span class="location">  <?=\incl\burger\Def\Template::$city_top[\lib\Def\Opt::$lang];?></span></div>
            <div id="bhtimew"><?=\incl\burger\Def\Template::$time_work_top[\lib\Def\Opt::$lang];?> 08:00 до 19:00</div>
            <div id="bhmenu">
                <a href="/"><?=\incl\burger\Def\Template::$m_t_dostavka[\lib\Def\Opt::$lang];?></a><a href="/"><?=\incl\burger\Def\Template::$m_t_contact[\lib\Def\Opt::$lang];?></a>
            </div>
            <div id="bhtel">
                <a href="tel:+380963035583"> +38(096)303-55-83</a>
            </div>
            <div class="lng_btn">
                <!--<span id="lng_en_btn" class="lng_en" title="english" data-lng="en" onClick="lngBtn(this);"></span>-->
                <span id="lng_ru_btn" class="lng_ru" title="русский" data-lng="ru" onClick="lngBtn(this);"></span>
                <span id="lng_uk_btn" class="lng_uk" title="українська" data-lng="uk" onClick="lngBtn(this);"></span>
                <div class="cl"></div>
                <script type="text/javascript">
                    function lngBtn(el){
                        document.cookie="lng="+el.dataset.lng+";domain=."+document.location.host;
                        var flag=0;
                        switch(el.dataset.lng){
                            case "uk":flag=1;break;
                            default:flag=0;
                        }
                        var nUri="/";
                        if(flag){nUri+=el.dataset.lng+"/";}
                        location.href=nUri;
                    }
                </script>
            </div>
            <div class="cl"></div>
        </div>
    </div>
    <div id="headerback"></div>
    <div id="header">
        <div class="maxw rel">
            <div id="logo"><a href="/"><img src="/img/site/dbpic.php?i=logo&ep=1" alt="<?=\incl\burger\Def\Template::$service_name[\lib\Def\Opt::$lang];?>" title="<?=\incl\burger\Def\Template::$service_name[\lib\Def\Opt::$lang];?>"></a></div>
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
                                <li><a href="#burger-section" onclick="burgerClickClose();"><?=\incl\burger\Def\Template::$m_b_burger[\lib\Def\Opt::$lang];?></a></li>
                                <li><a href="#pizza-section" onclick="burgerClickClose();"><?=\incl\burger\Def\Template::$m_b_pizza[\lib\Def\Opt::$lang];?></a></li>
                                <li><a href="/#nuggets-section" onclick="burgerClickClose();"><?=\incl\burger\Def\Template::$m_b_nuggets[\lib\Def\Opt::$lang];?></a></li>
                                <li><a href="/#beverages-section" onclick="burgerClickClose();"><?=\incl\burger\Def\Template::$m_b_beverages[\lib\Def\Opt::$lang];?></a></li>
                            </ul>
                        </div>

                    </div>

                    <div id="burger_pc">
                        <ul>
                            <li><a href="/#burger-section"><?=\incl\burger\Def\Template::$m_b_burger[\lib\Def\Opt::$lang];?></a></li>
                            <li><a href="/#pizza-section"><?=\incl\burger\Def\Template::$m_b_pizza[\lib\Def\Opt::$lang];?></a></li>
                            <li><a href="/#nuggets-section"><?=\incl\burger\Def\Template::$m_b_nuggets[\lib\Def\Opt::$lang];?></a></li>
                            <li><a href="/#beverages-section"><?=\incl\burger\Def\Template::$m_b_beverages[\lib\Def\Opt::$lang];?></a></li>
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