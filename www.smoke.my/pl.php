<?php

namespace lib\Def;

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
//$Opt=new Opt('sota');//Def opt
/*
if(\lib\Get\Get::issetGetArr()){

    echo '
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>OTTPlayer</title>

    <script>
        var locations = [
            "http://widget1.ottplayer.es/",
            "http://widget.ottplayer.es/",
            "http://88.150.252.53/",
            ""];
        function l(li,t,n){
            t = document.createElement(\'script\');
            t.type = "text/javascript";
            t.async=false;
            t.onerror=function() {
                n.parentNode.removeChild(t);
                li++;
                if (li < locations.length) {
                    if (typeof onLoad === "undefined") {
                        onLoad = function() {
                            l(li);
                        };
                    } else {
                        l(li);
                    }
                } else {
                    document.body.style.background = "#455000";
                    var eb = document.createElement("div");
                    eb.style.cssText = "color:red;width:94%;height:1.2em;top:12%;left:3%;position:absolute;background:transparent;z-index:100;font-size:1.6em;text-align:center;border-radius:0.2em;";
                    document.body.appendChild(eb);
                    eb.innerHTML = "Application load failed 7775544";
                }
            };
            
            window.loaderLocation = locations[li];
            t.src = locations[li]+"js/loader.js?rcid="+(new Date()).getTime();
            n = document.getElementsByTagName(\'script\')[0];
            n.parentNode.insertBefore(t,n);
        };
        l(0);

    </script>
    </head>
    <body onload="onLoad();" onunload="onUnload();">
         <div id="objects"> 
             <object id="pluginSef" border=0 classid="clsid:SAMSUNG-INFOLINK-SEF" ></object>
             <object id="pluginPlayer" border=0 classid="clsid:SAMSUNG-INFOLINK-PLAYER"></object>
             <object id="pluginAudio" border=0  classid="clsid:SAMSUNG-INFOLINK-AUDIO" ></object>         
             <object id="pluginObjectTVMW" border=0 classid="clsid:SAMSUNG-INFOLINK-TVMW"></object>
             <object id="pluginObjectNNavi" border=0 classid="clsid:SAMSUNG-INFOLINK-NNAVI"></object>
             <object id="pluginObjectNetwork" border=0 classid="clsid:SAMSUNG-INFOLINK-NETWORK"></object>
             <object id="pluginObjectTV" border=0 classid="clsid:SAMSUNG-INFOLINK-TV"></object>  
         </div>
	</body>
</html>
';
}
else{echo '';}*/

?>

<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Детский портал - Малыш">
    <link rel="author" href="https://plus.google.com/110711708448558111115">
    <meta name="copyright" lang="ru" content="Детский портал - Малыш">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-color: #ffffdd;
        }
    </style>

    <meta name="description"
          content="Устами младенца: цитаты, высказывания, афоризмы на сайте детского портала. Обмениваемся забавными курьёзами наших малышей">
    <meta name="keywords" content="Устами младенца, юмор, детские истории">
    <title>Устами младенца</title></head>
<body>
<div id="bh" class="maxw">
    <div class="cl"></div>
</div>
<div id="header" class="maxw">
    <header><br><br><br>
<?php
if(\lib\Get\Get::issetGetArr()){
    echo '<a href="/pl.php?get=ewe">yes get запрос...</a><br><br><br>';

}else{

    echo '<a href="/pl.php?get=e">no get запрос...</a><br><br><br>';
}

if(\lib\Post\Post::issetPostArr()){
    echo '<a href="#">yes post запрос...</a><br><br><br>';
}else{

    echo '<a href="/pl.php?ax=4">no post запрос...</a><br><br><br>';
}

?>

        <br><br><br><br><br>
        <div class="cl"></div>
    </header>
</div>
<div id="ah" class="maxw">
    <div class="cl"></div>
</div>
<div id="wrap" class="maxw">
    <div id="l_col" class="fl rel">

        <div class="l_menu rel">
            <div class="l_menu_title">Игровая</div>
            <nav>
                <ul>
                    <li><a href="/лабиринты-распечатать/">Лабиринты на печать</a></li>
                </ul>
            </nav>
        </div>
        <div class="l_menu rel">
            <div class="l_menu_title">Математика</div>
            <nav>
                <ul>
                    <li><a href="/математика/соседи-числа/">Соседи числа</a></li>
                    <li><a href="/математика/сложение/">Сложение</a></li>
                    <li><a href="/математика/вычитание/">Вычитание</a></li>
                </ul>
            </nav>
        </div>
        <div class="l_menu rel">
            <div class="l_menu_title">Обучающие слайды</div>
            <nav>
                <ul>
                    <li><a href="/обучающие-слайды/алфавит-звуки-и-буквы/">Алфавит, звуки и буквы</a></li>
                    <li><a href="/обучающие-слайды/цифры-и-математика/">Цифры и математика</a></li>
                </ul>
            </nav>
        </div>
        <div class="l_menu rel">
            <div class="l_menu_title">Юмор</div>
            <nav>
                <ul>
                    <li><a href="/устами-младенца/">Устами младенца</a></li>
                </ul>
            </nav>
        </div>
        <div class="cl"></div>
    </div>
    <div id="m_col" class="rel"><!--Пр кол-->
        <div id="r_col" class="fr rel">
            <div class="r_menu rel">
                <div class="r_menu_title">Доп.материалы</div>
                <nav>
                    <ul>
                        <li><a href="/скороговорки-для-малышей">Скороговорки для малышей</a></li>
                        <li><a href="/считалки/">Считалочки</a></li>
                        <li><a href="/колыбельные/">Колыбельные песенки</a></li>
                    </ul>
                </nav>
            </div>
            <div class="r_menu rel">
                <div class="r_menu_title">Беременность и роды</div>
                <nav>
                    <ul>
                        <li><a href="/беременность/планирование/">Планирование, подготовка</a></li>
                        <li><a href="/беременность/красота/">Красота и уход</a></li>
                        <li><a href="/беременность/здоровье/">Забота о здоровье</a></li>
                    </ul>
                </nav>
            </div>
            <div class="r_menu rel">
                <div class="r_menu_title">Уход за младенцем</div>
                <nav>
                    <ul>
                        <li><a href="/новорожденный/">Новорожденный</a></li>
                        <li><a href="/детское-здоровье/">Детское здоровье</a></li>
                        <li><a href="/советы-родителям/">Советы родителям</a></li>
                    </ul>
                </nav>
            </div>
            <div class="cl"></div>
        </div><!--Центр кол-->
        <div id="c_col" class="rel">
            <main>
                <article>
                    <div class="fon_c"><h3>Устами младенца</h3></div>
                    <div class="fon_c ac nav_link"><p><b>1</b> | <a href="/устами-младенца/2">2</a>&nbsp;&nbsp;<a
                                href="/устами-младенца/2">&gt;</a>&nbsp;&nbsp;&nbsp;<a href="/устами-младенца/2"
                                                                                       title="Перейти на последнюю страницу">&gt;&gt;</a>
                        </p></div>
                    <div class="fon">
                        <div class="caprek fl">

                        </div>
                        <div class="caprek fr">

                        </div>
                        <div class="cl"></div>
                    </div>
                    <div id="wrapsms">
                        <div id="allsms">
                            <div class="fon_c">
                                <section>
                                    <div class="header_c"><h5>Ахмед - 6</h5></div>
                                    <div><p>Инопланетяне едут стоя в автобусе в семь утра И УЛЫБАЮТСЯ.</p></div>
                                </section>
                            </div>
                            <div class="fon_c">
                                <section>
                                    <div class="header_c"><h5>Ахмед - 6</h5></div>
                                    <div><p>Почему не говоришь?<br>
                                            Все умеют говорить, только не спрашивали</p></div>
                                </section>
                            </div>
                            <div class="fon_c">
                                <section>
                                    <div class="header_c"><h5>Дарья Ярлыкова Сергеевна - 10 лет</h5></div>
                                    <div><p>Страна енотия - это находится ньютон парк, 3 этаж</p></div>
                                </section>
                            </div>
                            <div class="fon_c">
                                <section>
                                    <div class="header_c"><h5>Мила - 6</h5></div>
                                    <div><p>Ребёнку объясняю: «Когда два малыша вместе рождаются — это ДВОЙняшки, когда
                                            три — ТРОЙняшки…» Он: «А когда по одному, просто НЯШКИ?» Ну, да, примерно
                                            так…</p></div>
                                </section>
                            </div>
                            <div class="fon_c">
                                <section>
                                    <div class="header_c"><h5>Олег - 4</h5></div>
                                    <div><p>- Мама, мне папа помыл голову. Теперь она вся блестит. Мама, понюхай, как
                                            она блестит.</p></div>
                                </section>
                            </div>
                            <div class="fon_c">
                                <section>
                                    <div class="header_c"><h5>Ярослав - 3,5</h5></div>
                                    <div><p>Я общалась по вайберу, Ярослав долго мужу говорил:<br>- Улыбаешься,
                                            улыбаешься.<br>А потом как выдаст: - Улыбаешься с*ка, улыбашься.<br>Мы упали
                                            со смеху.</p></div>
                                </section>
                            </div>

                        </div>
                    </div>
                    <div class="fon_c ac nav_link"><p><b>1</b> | <a href="/устами-младенца/2">2</a>&nbsp;&nbsp;<a
                                href="/устами-младенца/2">&gt;</a>&nbsp;&nbsp;&nbsp;<a href="/устами-младенца/2"
                                                                                       title="Перейти на последнюю страницу">&gt;&gt;</a>
                        </p></div>
                    <div class="fon_c"><h4 id="dobavit-slova-svoego-rebenka">Добавить слова своего ребенка</h4>
                        <form id="baby-words-form" class="form" method="post"><p>Имя ребёнка:</p><input type="text"
                                                                                                        name="name"
                                                                                                        required
                                                                                                        placeholder="Имя ребёнка *"
                                                                                                        maxlength="100">
                            <p>Возраст ребёнка:</p><input type="text" name="age" required
                                                          placeholder="Возраст ребёнка *" maxlength="20">
                            <p>Слова ребёнка:</p><textarea name="sms" required rows="5" maxlength="1000"
                                                           placeholder="Введите слова ребёнка *"></textarea>
                            <p>Введите код с картинки</p>
                            <div class="dwf"><img id="imgcaptcha" class="five br" alt=""
                                                  src="/img/site/captcha.php"><input type="number" name="captcha"
                                                                                     required
                                                                                     placeholder="Код с картинки *"
                                                                                     min="1" max="99999"></div>
                            <input type="submit" value="отправить"></form>
                        <p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div>
                    <script type="text/javascript">
                        alert("qwerty");
                    </script>
                </article>
            </main>
            <div class="cl"></div>
        </div><!--Конец Центр кола-->
        <div class="cl"></div>
    </div><!--end m_col-->
    <div class="cl"></div>
</div><!--end maxw-->
<div id="bf" class="maxw">
    <div class="cl"></div>
</div>
<div id="foot" class="rel">
    <footer>
        <div class="footmenu">
            <nav>
                <ul>
                    <li><a href="/обратная-связь">Обратная связь</a></li>
                </ul>
            </nav>
            <div class="cl"></div>
        </div>
        <div id="share" class="nav_link"><!--g+1-->

            <div class="cl"></div>
        </div>
        <div id="copy" class="ac">Copyright &copy;dp-malish.com - Детский портал - &laquo;Малыш&raquo; 2015-2019<br><br>Использование
            материалов сайта без разрешения правообладателя запрещено
        </div>

        <div id="up"> ^ Наверх</div>
        <div class="cl"></div>
    </footer>
</div></body>
</html>

