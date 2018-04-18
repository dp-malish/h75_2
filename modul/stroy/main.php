<?php
namespace lib\Def;
try{
  if($count_uri_parts>1){throw new Exception();
  }else{
    if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[0])){$module='404';
    }else{
      $DB=new SQLi();
      $res=$DB->strSQL('SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text FROM def_content WHERE link='.$DB->realEscapeStr($uri_parts[0]));
      if($res){
        Opt::$title=$res['title'];Opt::$description=$res['meta_d'];Opt::$keywords=$res['meta_k'];
        if($res['img']!=''){
          $img='<img class="fl five" src="/img/site/pic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';
        }else{$img='';}
        Opt::$main_content.='<div class="fon_c"><article><h3>'.$res['caption'].'</h3>'.$img.$res['full_text'].'</article><div class="cl"></div></div>';
      }else{
        $module='404';
      }
    }
  }
}catch(Exception $e){$module='404';}