<?php
namespace lib\Def;
use lib\Img as Img;

if(\lib\Post\Post::issetPostArr()){
    $img=new Img\ImgExt();
    if(isset($_POST['imgadd'])){
        if ($img->insImg('tableimg', 'imgfile')){
            Opt::$main_content .= '<div class="fon_c"><p>Изображение добавлено в раздел "' . Img\ImgExt::getImgSection($_POST['tableimg']).'"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="' . Img\ImgExt::getImgDir($_POST['tableimg']).$img->img.'" alt="" title=""></xmp></div><div class="fon_c"><xmp>' . Img\ImgExt::getImgDir($_POST['tableimg']).$img->img.'</xmp></div>';
        }else{
            if(count(Validator::$ErrorForm)>0)Opt::$main_content .= Validator::$ErrorForm[0];else Opt::$main_content.= 'Неизвестная ошибка...';
        }
    }elseif(isset($_POST['imgaddext'])){$img->insImgExt('tableimg','imgfiles');
        foreach($img->imgExt as $v){
            Opt::$main_content.='<p>'.Img\ImgExt::getImgDir($_POST['tableimg']).$v.'<div class="ac"><img class="five" src="'.Img\ImgExt::getImgDir($_POST['tableimg']).$v.'" alt="" style="max-width:200px"></div></p>';
        }
        if(count(Validator::$ErrorForm)>0){Opt::$main_content.='<br>';foreach(Validator::$ErrorForm as $v){Opt::$main_content.='<p>'.$v.'</p>';}}
    }
    elseif(isset($_POST['imgupd'])){
        if($img->insImg('tableimg','imgfile',$_POST['imgnumber'])){
            Opt::$main_content.='<div class="fon_c"><p>Изображение обновлено в раздел "'.Img\ImgExt::getImgSection($_POST['tableimg']).'"</p></div><h4>html код:</h4><div class="fon_c"><xmp><img class="five" src="'.Img\ImgExt::getImgDir($_POST['tableimg']).$img->img.'" alt="" title=""></xmp></div><div class="fon_c"><xmp>'.Img\ImgExt::getImgDir($_POST['tableimg']).''.$img->img.'</xmp></div>';}
        else{if(count(Validator::$ErrorForm)>0)Opt::$main_content.=Validator::$ErrorForm[0];else Opt::$main_content.='Неизвестная ошибка...';}
    }
}
if(Route::$uri_parts[1]=='картинки'){
    Opt::$main_content.='<div class="fon_c"><h3>Добавить рисунок</h3>'.Cache_File::$cash->SendHTML('../model/admin/AddImg.php').'</div>';
}elseif(Route::$uri_parts[1]=='картинки-пакетно'){
    Opt::$main_content.='<div class="fon_c"><h3>Добавить рисуноки (пакетно)</h3>'.Cache_File::$cash->SendHTML('../model/admin/AddImgExt.php').'</div>';
}elseif(Route::$uri_parts[1]=='картинки-изменить'){
    Opt::$main_content.='<div class="fon_c"><h3>Изменить рисунок</h3>'.Cache_File::$cash->SendHTML('../model/admin/UpdImg.php').'</div>';
}
