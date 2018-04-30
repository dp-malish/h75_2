<?php
namespace lib\Def;
use lib\Post as Post;
if(Validator::paternInt($uri_parts[2])){
    $DB=new SQLi();
    if(Post\Post::issetPostArr()){
        if(Post\Post::issetPostKey(['sms'])){
            $id=Validator::html_cod($_POST['sms']);
            if(Validator::paternInt($id)){
                /*if($DB->boolSQL('UPDATE feedback SET readed=1 WHERE id='.$DB->realEscapeStr($id)))
                    $main_content.='<div class="fon_c five_ b">Сообщение прочитано...</div>';
                else $main_content.='<div class="fon_c five_ b">Ошибка сообщения!!!</div>';*/
                Opt::$main_content.='<div class="fon_c five_ b">'.(($DB->boolSQL('UPDATE feedback SET readed=1 WHERE id='.$DB->realEscapeStr($id)))?'Сообщение прочитано...':'Ошибка сообщения!!!').'</div>';
            }
        }
    }
    $res=$DB->strSQL('SELECT readed,name,mail,theme,text,data FROM feedback WHERE id='.$DB->realEscapeStr($uri_parts[2]));
    if($res){
        Opt::$main_content.='<div class="fon_c"><div class="five_">Пользователь: '.$res['name'].'</div>'.
            '<div class="five_">Почта: '.$res['mail'].'</div>'.
            '<div class="five_">Тема сообщения: '.$res['theme'].'</div>'.
            '<div class="five_"><span class="b">Сообщение:</span><br>'.$res['text'].'</div>'.
            '<div class="five_ ar">Дата: '.Data::IntToStrDateTime($res['data']).'</div>';
        if($res['readed']==''){
            Opt::$main_content.='<form class="form" method="post"><input type="hidden" name="sms" value="'.$uri_parts[2].'"><input type="submit" value="Прочитано"></form>';
        }
        Opt::$main_content.='</div>';
    }else Opt::$main_content.='Нет такого сообщения...';
}else Opt::$main_content.='feedback...';