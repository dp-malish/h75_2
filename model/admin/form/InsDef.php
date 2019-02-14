<div class="fon_c"><h4>Общие страницы</h4><form name="form" class="form" method="post">
        <p>link | ссылка страницы *</p><input name="link" id="link" type="text" required placeholder="Ссылка страницы">

        <p>link_name &darr; | подпись ссылки &darr; *</p><input name="link_name" type="text" onKeyUp="str_to_link(this)" title="писать с маленькой буквы, чтоб поподала в кейвордс" required placeholder="Подпись ссылки (с маленькой буквы)"><br><br><br>

        <script type="text/javascript">function str_to_link(val_input){
                var str=val_input.value.toLowerCase();
                str=str.replace(/ /ig,'-');
                document.getElementById('link').value=str;}</script>

        <p>Номер меню</p><select name="menu" id="menu"><option value="">Без номера</option><?php
            for($i=0;$i<13;$i++){$content.='<option value="'.$i.'">'.$i.'</option>';}echo $content;?></select>

        <p>link turn | порядок страницы</p><input type="number" name="link_turn" id="link_turn" placeholder="Порядок страницы" min="0"><br><br><br>

        <p>title | титл страницы *</p><input name="title" id="title" required placeholder="Титл страницы" maxlength="80">

        <p>meta_d | описание страницы полностью *</p><input type="text" name="meta_d" id="meta_d" required placeholder="Описание страницы" maxlength="255">

        <p>meta_k | поисковые слова *</p><input type="text" name="meta_k" id="meta_k" required placeholder="Поисковые слова" maxlength="255">

        <p>caption | заголовок *</p><input type="text" name="caption" id="caption" required placeholder="Заголовок" maxlength="255"><br><br><br>

        <p>img_s | рисунок</p><input type="number" name="img_s" id="img_s" min="1" placeholder="Номер рисунка (маленький)" onchange="img_small()">
        <div id="img_s_view" class="ac"></div>
                <script type="application/javascript">
                        function img_small(){
                                var i=document.getElementById('img_s').value;
                                var s="/img/site/pic.php?id=";
                                s+=i;
                                img_s_view.innerHTML='<img src="'+s+'">';
                        }
                </script>

        <p>img alt_s | описание рисунка</p><input type="text" name="img_alt_s" id="img_alt_s" placeholder="Описание рисунка (маленький)">

        <p>img_title_s | описание рисунка (всплывающее)</p><input type="text" name="img_title_s" id="img_title_s" placeholder="Описание рисунка (маленький)">

        <p>short_text | короткий текст</p><textarea type="text" name="short_text" id="short_text" rows="8"></textarea><br><br><br>

        <p>img | рисунок</p><input type="number" name="img" id="img" min="1" placeholder="Номер рисунка" onchange="img_big()">
                <div id="img_big_view" class="ac"></div>
                <script type="application/javascript">
                        function img_big(){
                                var i=document.getElementById('img').value;
                                var s="/img/site/pic.php?id=";
                                s+=i;
                                img_big_view.innerHTML='<img src="'+s+'">';
                        }
                </script>

        <p>img alt | описание рисунка</p><input type="text" name="img_alt" id="img_alt" placeholder="Описание рисунка">

        <p>img_title | описание рисунка (всплывающее)</p><input type="text" name="img_title" id="img_title" placeholder="Описание рисунка">

        <p>left_text | левый текст</p><textarea type="text" name="left_text" id="left_text"></textarea>

        <p>right_text | правый текст</p><textarea type="text" name="right_text" id="right_text"></textarea>

        <p>full_text | полный текст</p><textarea type="text" name="full_text" id="full_text" rows="13" required></textarea>

<input type="submit" value="отправить"></form><p class="note">Примечание: поля, помеченные * звездочкой - обязательны для заполнения</p></div><script type="application/javascript">CKEDITOR.replace('short_text');CKEDITOR.replace('full_text');</script>