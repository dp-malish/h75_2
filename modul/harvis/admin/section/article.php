<?php
$jscript.='<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>';
if(!isset($_GET['update'])){
if(PostRequest::issetPostArr()){//вставить новую
    if(PostRequest::issetPostKey(['link','link_name','title','meta_d','meta_k','caption','short_text','full_text'])){
        $link=ValidForm::link($_POST['link']);
        $link_name=ValidForm::str($_POST['link_name'],'подпись ссылки',255);
        $title=ValidForm::str($_POST['title'],'титл',255);
        $meta_d=ValidForm::str($_POST['meta_d'],'описание страницы',255);
        $meta_k=ValidForm::str($_POST['meta_k'],'поисковые слова',255);
        $caption=ValidForm::str($_POST['caption'],'заголовок',255);
        $img_i=ValidForm::int($_POST['img_i'],'номер рисунка (индекс)');
        $img_alt_i=ValidForm::str($_POST['img_alt_i'],'описание рисунка (индекс)',255);
        $img_title_i=ValidForm::str($_POST['img_title_i'],'описание рисунка (всплывающее) (индекс)',255);
        $index_text=ValidForm::text($_POST['index_text'],'индекс текст');
        $img_s=ValidForm::int($_POST['img_s'],'номер рисунка (маленький)');
        $img_alt_s=ValidForm::str($_POST['img_alt_s'],'описание рисунка (маленький)',255);
        $img_title_s=ValidForm::str($_POST['img_title_s'],'описание рисунка (всплывающее) (маленький)',255);
        $short_text=ValidForm::text($_POST['short_text'],'короткий текст');
        $img=ValidForm::int($_POST['img'],'номер рисунка');
        $img_alt=ValidForm::str($_POST['img_alt'],'описание рисунка',255);
        $img_title=ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
        $full_text=ValidForm::text($_POST['full_text'],'основной текст',21000);
        $author=ValidForm::str($_POST['author'],'описание рисунка',100);
        if(empty(Validator::$ErrorForm)){
        $sql='INSERT INTO article(link,link_name,title,meta_d,meta_k,caption,
  img_i,img_alt_i,img_title_i,index_text,img_s,img_alt_s,img_title_s,short_text,
  img,img_alt,img_title,full_text,author,data)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURDATE());';
        $DB=new SQLi();
        $sql=$DB->realEscape($sql,[$link,$link_name,$title,$meta_d,$meta_k,$caption,
$img_i,$img_alt_i,$img_title_i,$index_text,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$full_text,$author]);
        $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись добавлена':'Ошибка базы данных').'</p></div>';
        }else{$main_content.='<div class="fon_c">';
            foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';
        }
    }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
}$main_content.=$Cash->SendHTML('../models/admin/form/InsArticle.php');
}else{
    if(PostRequest::issetPostArr()){
        if(PostRequest::issetPostKey(['idlink'])){//отобразить для вставки
            $id=Validator::html_cod($_POST['idlink']);
            if(Validator::paternInt($id)){
                $DB=new SQLi();
                $res=$DB->strSQL('SELECT * FROM article WHERE id='.$DB->realEscapeStr($id));
                if($res){$main_content.=$Cash->SendHTMLext('../models/admin/form/UpdArticle.php',[$res['id'],$res['link'],$res['link_name'],
                $res['title'],$res['meta_d'],$res['meta_k'],$res['caption'],
                $res['img_i'],$res['img_alt_i'],$res['img_title_i'],htmlspecialchars_decode($res['index_text'],ENT_QUOTES),
                $res['img_s'],$res['img_alt_s'],$res['img_title_s'],htmlspecialchars_decode($res['short_text'],ENT_QUOTES),
                $res['img'],$res['img_alt'],$res['img_title'],htmlspecialchars_decode($res['full_text'],ENT_QUOTES),$res['author'],$res['data']
                ]);
                }else $main_content.='<div class="fon_c">Страница не найдена</div>';
            }else $main_content.='Страница не найдена';
        }elseif(PostRequest::issetPostKey(['id','link','link_name','title','meta_d','meta_k','caption','short_text','full_text'])){//ищменить
            $id=ValidForm::int($_POST['id'],'неизвестная ошибка');
            $link=ValidForm::link($_POST['link']);
            $link_name=ValidForm::str($_POST['link_name'],'подпись ссылки',255);
            $title=ValidForm::str($_POST['title'],'титл',255);
            $meta_d=ValidForm::str($_POST['meta_d'],'описание страницы',255);
            $meta_k=ValidForm::str($_POST['meta_k'],'поисковые слова',255);
            $caption=ValidForm::str($_POST['caption'],'заголовок',255);
            $img_i=ValidForm::int($_POST['img_i'],'номер рисунка (индекс)');
            $img_alt_i=ValidForm::str($_POST['img_alt_i'],'описание рисунка (индекс)',255);
            $img_title_i=ValidForm::str($_POST['img_title_i'],'описание рисунка (всплывающее) (индекс)',255);
            $index_text=ValidForm::text($_POST['index_text'],'индекс текст');
            $img_s=ValidForm::int($_POST['img_s'],'номер рисунка (маленький)');
            $img_alt_s=ValidForm::str($_POST['img_alt_s'],'описание рисунка (маленький)',255);
            $img_title_s=ValidForm::str($_POST['img_title_s'],'описание рисунка (всплывающее) (маленький)',255);
            $short_text=ValidForm::text($_POST['short_text'],'короткий текст');
            $img=ValidForm::int($_POST['img'],'номер рисунка');
            $img_alt=ValidForm::str($_POST['img_alt'],'описание рисунка',255);
            $img_title=ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
            $full_text=ValidForm::text($_POST['full_text'],'основной текст',21000);
            $author=ValidForm::str($_POST['author'],'описание рисунка',100);
            $data=ValidForm::str($_POST['data'],'дата',13);
            if(empty(Validator::$ErrorForm)){
                $sql='UPDATE article SET link=?,link_name=?,title=?,meta_d=?,meta_k=?,caption=?,
img_i=?,img_alt_i=?,img_title_i=?,index_text=?,img_s=?,img_alt_s=?,img_title_s=?,short_text=?,
img=?,img_alt=?,img_title=?,full_text=?,author=?,data=? WHERE id=?';
                $DB=new SQLi();
                $sql=$DB->realEscape($sql,[$link,$link_name,$title,$meta_d,$meta_k,$caption,$img_i,$img_alt_i,$img_title_i,$index_text,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$full_text,$author,$data,$id]);
                $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись изменена':'Ошибка базы данных').'</p>
                <p><a href="">Вернуться в раздел</a></p>
                </div>';
            }else{$main_content.='<div class="fon_c">';
                foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';
            }
        }else $main_content.='Страница не найдена';
    }else{//выбрать статью
        $DB=new SQLi();$res=$DB->arrSQL('SELECT id,caption FROM article ORDER BY id DESC');
        $main_content.='<div class="fon_c"><h3>Редактировать статьи</h3><form name="form" class="form" method="post" onsubmit="return sendForm()"><select name="idlink" id="idlink"><option value="">Выбрать статью</option>';
        foreach($res as $v){$main_content.='<option value="'.$v['id'].'">'.$v['caption'].'</option>';}
        $main_content.='</select><input type="submit" value="Выбрать статью"></form></div><script>function sendForm(){
if(document.getElementById("idlink").value==""){alert("Заполнить форму");return false;}else return true;}</script>';
    }
}