<?php
$main_content.=$Cash->SendHTML('../models/admin/form/harvis/ImgGallery.php');
if(PostRequest::issetPostArr()){
    $jscript.='<script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>';
    if(PostRequest::issetPostKey(['tableimg','selectimg'])){
        $img=Validator::html_cod($_POST['selectimg']);
        $t=Validator::html_cod($_POST['tableimg']);
        if(Validator::paternInt($img)&&Validator::paternInt($t)){
        $main_content.='<div class="fon_c ac"><img src="'.Img::getImgDir($t).$img.'" alt="Рисунок '.$img.'"></div>';
            switch($t){
                case 2:$table='gallery_fireplace';break;
                case 3:$table='gallery_barbecue';break;
                case 4:$table='gallery_sauna';break;
                case 5:$table='gallery_pool';break;
                case 6:$table='gallery_marble';break;
                case 7:$table='gallery_tile';break;
                case 8:$table='gallery_ceiling';break;
                case 9:$table='gallery_reservoirs';break;
                default:$table='gallery_reservoirs';
            }
            $DB=new SQLi();
            $res=$DB->strSQL('SELECT * FROM '.$table.' WHERE img='.$DB->realEscapeStr($img));
            if($res)$main_content.=$Cash->SendHTMLext('../models/admin/form/harvis/UpdGallery.php',[$t,$img,$res['caption'],$res['img_alt'],$res['img_title'],$res['price'],$res['short_text'],$res['link_turn'],$res['data']]);
            else $main_content.=$Cash->SendHTMLext('../models/admin/form/harvis/InsGallery.php',[$t,$img]);
        }
    }elseif(PostRequest::issetPostKey(['insert','img','caption','img_alt','img_title','price','short_text','view','link_turn'])){
        $t=ValidForm::int($_POST['insert'],'странная ошибка');
        $img=ValidForm::int($_POST['img'], 'номер рисунка');
        $caption=ValidForm::str($_POST['caption'],'заголовок',255);
        $img_alt=ValidForm::str($_POST['img_alt'],'описание рисунка',255);
        $img_title=ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
        $price=ValidForm::int($_POST['price'],'цена');
        $short_text=ValidForm::text($_POST['short_text'],'короткий текст');
        $view=ValidForm::int($_POST['view']);
        $link_turn=ValidForm::int($_POST['link_turn'],'порядок рисунка');
        if(empty(Validator::$ErrorForm)){
            switch($t){
               case 2:$table='gallery_fireplace';break;
               case 3:$table='gallery_barbecue';break;
               case 4:$table='gallery_sauna';break;
               case 5:$table='gallery_pool';break;
               case 6:$table='gallery_marble';break;
               case 7:$table='gallery_tile';break;
               case 8:$table='gallery_ceiling';break;
               case 9:$table='gallery_reservoirs';break;
               default:$table='gallery_reservoirs';
            }
            $sql='INSERT INTO '.$table.'(caption,img,img_alt,img_title,short_text,price,view,link_turn,data)VALUES(?,?,?,?,?,?,?,?,CURDATE());';
            $DB=new SQLi();
            $sql=$DB->realEscape($sql,[$caption,$img,$img_alt,$img_title,$short_text,$price,$view,$link_turn]);
            $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись добавлена':'Ошибка базы данных').'</p></div>';
        }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';}
    }elseif(PostRequest::issetPostKey(['update','img','caption','img_alt','img_title','price','short_text','view','link_turn','data'])){
        $t=ValidForm::int($_POST['update'],'странная ошибка');
        $img=ValidForm::int($_POST['img'], 'номер рисунка');
        $caption=ValidForm::str($_POST['caption'],'заголовок',255);
        $img_alt=ValidForm::str($_POST['img_alt'],'описание рисунка',255);
        $img_title=ValidForm::str($_POST['img_title'],'описание рисунка (всплывающее)',255);
        $price=ValidForm::int($_POST['price'],'цена');
        $short_text=ValidForm::text($_POST['short_text'],'короткий текст');
        $view=ValidForm::int($_POST['view']);
        $link_turn=ValidForm::int($_POST['link_turn'],'порядок рисунка');
        $data=ValidForm::str($_POST['data'],'дата',13);
        if(empty(Validator::$ErrorForm)){
            switch($t){
               case 2:$table='gallery_fireplace';break;
               case 3:$table='gallery_barbecue';break;
               case 4:$table='gallery_sauna';break;
               case 5:$table='gallery_pool';break;
               case 6:$table='gallery_marble';break;
               case 7:$table='gallery_tile';break;
               case 8:$table='gallery_ceiling';break;
               case 9:$table='gallery_reservoirs';break;
               default:$table='gallery_reservoirs';
            }
            $sql='UPDATE '.$table.' SET caption=?,img_alt=?,img_title=?,short_text=?,price=?,view=?,link_turn=?,data=? WHERE img=?';
            $DB=new SQLi();
            $sql=$DB->realEscape($sql,[$caption,$img_alt,$img_title,$short_text,$price,$view,$link_turn,$data,$img]);
            $main_content.='<div class="fon_c"><p>'.($DB->boolSQL($sql)?'Запись изменена':'Ошибка базы данных').'</p></div>';
        }else{$main_content.='<div class="fon_c">';foreach(Validator::$ErrorForm as $v){$main_content.='<p>'.$v.'</p>';}$main_content.='</div>';}
    }else{$main_content.='<div class="fon_c"><p>Заполнены не все поля формы...</p></div>';}
}