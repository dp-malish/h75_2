<?php
\lib\Def\Opt::$title='Контакты - обратная связь - Стройменс';
\lib\Def\Opt::$description='Обратная связь - контакты. Воспользовавшись формой обратной связи Вы с лёгкостью обратитесь к администрации сайта. Ваши письма для нас очень важны.';
\lib\Def\Opt::$keywords='обратная связь, форма обратной связи, контакты, Стройменс';
\lib\Def\Opt::$main_content.='<article><h4>Дорогие друзья!</h4><img src="/img/site/pic.php?i=letter&ep=1" class="fr five" alt="Контакты"><p>Нам очень приятно, что Вы обратились к специалистам «Стройменс» и мы докажем правильность Вашего выбора.</p><p>Основные представительства нашей организации сосредоточены <strong>в Донецкой, Херсонской, Харьковской, Днепропетровской, Одесской, Киевской областях</strong> Украины.</p><p>Данная страница призвана помочь пользователям оперативно связаться с администрацией. Воспользовавшись <a href="#forma-obratnoy-svyazi">формой обратной связи</a> Вы с лёгкостью обратитесь к администрации. Ваши письма для нас очень важны.</p><p>Если у Вас возникли вопросы, наша команда всегда рядом! Чтобы помочь Вам максимально оперативно, нам важны все детали. Опишите суть проблемы, и мы мгновенно отреагируем.</p><p>Хорошего Вам настроения!</p><br><h4>Наши координаты</h4><p>Администрация «Stroymans» доступно по телефонам:</p><ul><li><span class="grey">+38</span>(067) 621 01 86</li><li><span class="grey">+38</span>(097) 778 60 63</li></ul><br><p>Наш email: <a href="mailto:nikals@ukr.net">Nikals@ukr.net</a></p><br></article><div class="fon_c"><br><br><h4 id="forma-obratnoy-svyazi">Форма обратной связи</h4><form id="feedback-form" class="form" method="post"><p>Как к Вам обращаться:</p><input type="text" name="name" required placeholder="фамилия имя отчество *" maxlength="100"><p>Email для связи:</p><input type="email" name="mail" required placeholder="адрес электронной почты *" maxlength="100"><p>Тема сообщения:</p><input type="text" name="theme" required placeholder="Тема сообщения *" maxlength="100"><p>Ваше сообщение:</p><textarea name="sms" required rows="5" maxlength="1000"></textarea><p>Введите код с картинки</p><div class="dwf"><img id="imgcaptcha" alt="" class="five br" src="/img/site/captcha.php"><input type="number" name="captcha" required placeholder="Код с картинки *" min="1" max="99999"></div><input type="submit" value="отправить"></form><script type="text/javascript">document.getElementById("feedback-form").addEventListener("submit", function (evt){var f=this;evt.preventDefault();  var sendurl="name="+f.name.value+"&mail="+f.mail.value+"&theme="+f.theme.value+"&sms="+f.sms.value+"&feedback=1&captcha="+f.captcha.value;ajaxPostSend(sendurl,answerFeedback);},false);function answerFeedback(arr){alert(arr.answer);document.images["imgcaptcha"].src="/img/site/captcha.php?id="+Math.random();var f=document.getElementById("feedback-form");f.theme.value="";f.sms.removeAttribute("value");f.sms.value="";f.captcha.value="";}</script><p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p><br></div>';