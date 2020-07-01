<div id="header" class="maxw">
    <header>
        <div id="logo" class="fl rel"><a href="/"><img src="/img/site/dbpic.php?i=logo&ep=0" alt="WinTeH" title="WinTeH"></a><div class="cl"></div></div>
        <div class="h_field">
            <link rel="stylesheet" type="text/css" href="/lng.css">
            <div class="lng_btn">
                <span id="lng_en_btn" class="lng_en" title="english" data-lng="en" onClick="lngBtn(this);"></span>
                <span id="lng_ru_btn" class="lng_ru" title="русский" data-lng="ru" onClick="lngBtn(this);"></span>
                <span id="lng_uk_btn" class="lng_uk" title="українська" data-lng="uk" onClick="lngBtn(this);"></span>
                <script type="application/javascript">
                    function lngBtn(el){
                        document.cookie="lng="+el.dataset.lng+";domain=."+document.location.host;
                        location.href='/';
                    }
                </script>
            </div>
        </div>
        <div class="fon_c h_field ac"><h2><?=\incl\win\Def\Template::$service_name[\lib\Def\Opt::$lang];?></h2></div>
        <div class="fon_c h_field">
            <div class="top_l ac"><strong><?=\incl\win\Def\Template::$tel_top[\lib\Def\Opt::$lang];?>:</strong><br>
                <div class="inline telkiev">+38 (097) 523-77-87</div>
                <div class="cl"></div>
                <div class="inline vodafon">+38 (066) 911-84-44</div>
            </div>
            <div class="top_c ac"><strong><?=\incl\win\Def\Template::$address_top[\lib\Def\Opt::$lang];?>:</strong>
                <br><?=\incl\win\Def\Template::$city_top[\lib\Def\Opt::$lang];?>,<br><?=\incl\win\Def\Template::$address_street_top[\lib\Def\Opt::$lang];?>, 39
            </div>
            <div class="top_r ac"><strong><?=\incl\win\Def\Template::$mode_of_operation_top[\lib\Def\Opt::$lang];?>:</strong><br><?=\incl\win\Def\Template::$mode_of_operation_top_day[\lib\Def\Opt::$lang];?> 10.00-18.00,<br><?=\incl\win\Def\Template::$mode_of_operation_top_day_h[\lib\Def\Opt::$lang];?> 10.00-14.00</div>
            <div class="cl"></div>
        </div>
        <div class="h_field"><div class="cl"></div></div><div class="cl"></div>
    </header>
</div>