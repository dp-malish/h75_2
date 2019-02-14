<?php
namespace lib\Def;
use lib\user\Admin as Valid;

Opt::$jscript.='<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>';
if(!isset($_GET['update'])){
    if(\lib\Post\Post::issetPostArr()){
        if(\lib\Post\Post::issetPostKey(['link','link_name','title','meta_d','meta_k','caption','full_text'])){
            $link=Valid\ValidForm::link($_POST['link']);
            $link_name=Valid\ValidForm::str($_POST['link_name'],'подпись ссылки',255);
            $menu=Valid\ValidForm::int($_POST['menu']);
            $link_turn=Valid\ValidForm::int($_POST['link_turn'],'порядок страницы');
            $title=Valid\ValidForm::str($_POST['title'],'титл',255);
            $meta_d=Valid\ValidForm::str($_POST['meta_d'],'описание страницы',255);
            $meta_k=Valid\ValidForm::str($_POST['meta_k'],'поисковые слова',255);
            $caption=Valid\ValidForm::str($_POST['caption'],'заголовок',255);
            $img_s=Valid\ValidForm::int($_POST['img_s'],'номер рисунка (маленький)');
            $img_alt_s=Valid\ValidForm::str($_POST['img_alt_s'],'описание рисунка (маленький)',255);
            $img_title_s=Valid\ValidForm::str($_POST['img_title_s'],'описание рисунка (всплывающее) (маленький)',255);
            $short_text=Valid\ValidForm::text($_POST['short_text'],'короткий текст');
            $img=Valid\ValidForm::int($_POST['img'], 'номер рисунка');
            $img_alt=Valid\ValidForm::str($_POST['img_alt'],'описание рисунка',255);
            $img_title=Valid\ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
            $left_text=Valid\ValidForm::text($_POST['left_text'],'левый текст');
            $right_text=Valid\ValidForm::text($_POST['right_text'],'правый текст');
            $full_text=Valid\ValidForm::text($_POST['full_text'],'основной текст',21000);
            if(empty(Validator::$ErrorForm)){
                $sql='INSERT INTO default_content(link,link_name,menu,link_turn,title,meta_d,meta_k,caption,img_s,img_alt_s,img_title_s,short_text,img,img_alt,img_title,left_text,right_text,full_text,data)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURDATE());';
                $DB=new SQLi();
                $sql=$DB->realEscape($sql,[$link,$link_name,$menu,$link_turn,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$left_text,$right_text,$full_text]);
                Opt::$main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись добавлена':'Ошибка базы данных').'</p></div>';
            }else{Opt::$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){Opt::$main_content.='<p>'.$v.'</p>';}Opt::$main_content.='</div>';}
        }else{Opt::$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
    }
    Opt::$main_content.=Cache_File::$cash->SendHTML('../model/admin/form/InsDef.php');
}else{
    if(\lib\Post\Post::issetPostArr()){
        if(\lib\Post\Post::issetPostKey(['idlink'])){//отобразить для вставки
            $id=Validator::html_cod($_POST['idlink']);
            if(Validator::paternInt($id)){$DB=new SQLi();$res=$DB->strSQL('SELECT * FROM default_content WHERE id='.$DB->realEscapeStr($id));
                if($res){Opt::$main_content.=Cache_File::$cash->SendHTMLext('../models/admin/form/UpdDef.php',[$res['id'],$res['link'],$res['link_name'],$res['menu'],$res['link_turn'],$res['title'],$res['meta_d'],$res['meta_k'],$res['caption'],$res['img_s'],$res['img_alt_s'],$res['img_title_s'],htmlspecialchars_decode($res['short_text'],ENT_QUOTES),$res['img'],$res['img_alt'],$res['img_title'],htmlspecialchars_decode($res['left_text'],ENT_QUOTES),htmlspecialchars_decode($res['right_text'],ENT_QUOTES),htmlspecialchars_decode($res['full_text'],ENT_QUOTES),$res['data']]);
                }else Opt::$main_content.='<div class="fon_c">Страница не найдена</div>';
            }else Opt::$main_content.='Страница не найдена';
        }elseif(\lib\Post\Post::issetPostKey(['id','link','link_name','title','meta_d','meta_k','caption','full_text'])){
            $id=Valid\ValidForm::int($_POST['id'],'неизвестная ошибка');
            $link=Valid\ValidForm::link($_POST['link']);
            $link_name=Valid\ValidForm::str($_POST['link_name'],'подпись ссылки',255);
            $menu=Valid\ValidForm::int($_POST['menu']);
            $link_turn=Valid\ValidForm::int($_POST['link_turn'],'порядок страницы');
            $title=Valid\ValidForm::str($_POST['title'],'титл',255);
            $meta_d=Valid\ValidForm::str($_POST['meta_d'],'описание страницы',255);
            $meta_k=Valid\ValidForm::str($_POST['meta_k'],'поисковые слова',255);
            $caption=Valid\ValidForm::str($_POST['caption'],'заголовок',255);
            $img_s=Valid\ValidForm::int($_POST['img_s'],'номер рисунка (маленький)');
            $img_alt_s=Valid\ValidForm::str($_POST['img_alt_s'],'описание рисунка (маленький)',255);
            $img_title_s=Valid\ValidForm::str($_POST['img_title_s'],'описание рисунка (всплывающее) (маленький)',255);
            $short_text=Valid\ValidForm::text($_POST['short_text'],'короткий текст');
            $img=Valid\ValidForm::int($_POST['img'], 'номер рисунка');
            $img_alt=Valid\ValidForm::str($_POST['img_alt'],'описание рисунка',255);
            $img_title=Valid\ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
            $left_text=Valid\ValidForm::text($_POST['left_text'],'левый текст');
            $right_text=Valid\ValidForm::text($_POST['right_text'],'правый текст');
            $full_text=Valid\ValidForm::text($_POST['full_text'],'основной текст',21000);
            $data=Valid\ValidForm::str($_POST['data'],'дата',13);
            if(empty(Validator::$ErrorForm)){
                $sql='UPDATE default_content SET link=?,link_name=?,menu=?,link_turn=?,title=?,meta_d=?,meta_k=?,caption=?,img_s=?,img_alt_s=?,img_title_s=?,short_text=?,img=?,img_alt=?,img_title=?,left_text=?,right_text=?,full_text=?,data=? WHERE id=?';
                $DB=new SQLi();
                $sql=$DB->realEscape($sql,[$link,$link_name,$menu,$link_turn,$title,$meta_d,$meta_k,$caption,$img_s,$img_alt_s,$img_title_s,$short_text,$img,$img_alt,$img_title,$left_text,$right_text,$full_text,$data,$id]);
                Opt::$main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись изменена':'Ошибка базы данных').'</p>
                <p><a href="">Вернуться в раздел</a></p>
                </div>';
            }else{Opt::$main_content.='<div class="fon_c">';
                foreach(Validator::$ErrorForm as $v){Opt::$main_content.='<p>'.$v.'</p>';}Opt::$main_content.='</div>';
            }
        }else Opt::$main_content.='Страница не найдена';
    }else{//выбрать статью
    $DB=new SQLi();$res=$DB->arrSQL('SELECT id,caption FROM default_content ORDER BY id DESC');
        Opt::$main_content.='<div class="fon_c"><h3>Редактировать общие страницы</h3><form name="form" class="form" method="post" onsubmit="return sendForm()"><select name="idlink" id="idlink"><option value="">Выбрать статью</option>';
    foreach($res as $v){Opt::$main_content.='<option value="'.$v['id'].'">'.$v['caption'].'</option>';}
        Opt::$main_content.='</select><input type="submit" value="Выбрать статью"></form></div><script>function sendForm(){
if(document.getElementById("idlink").value==""){alert("Заполнить форму");return false;}else return true;}</script>';
}
}