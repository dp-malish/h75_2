<?php
namespace lib\Def;
$ind_article=Cache_File::$cash->IsSetCacheFile('common/article.html');
if(!$ind_article){$res=SQListatic::arrSQL_('SELECT link,caption,img_i,img_alt_i,img_title_i,index_text FROM article ORDER BY id DESC LIMIT 5');
    if($res){$ind_article='<h3>Последние статьи</h3>';
        foreach($res as $k=>$v){
            if($v['img_i']!=''){$img='<a href="/статьи/'.$v['link'].'"><img class="fl five br" src="/img/article/pic.php?id='.$v['img_i'].'" alt="'.$v['img_alt_i'].'" title="'.$v['img_title_i'].' - узнать подробнее..."></a>';}else{$img='';}
            $ind_article.='<div class="fon_c">'.$img.'<a href="/статьи/'.$v['link'].'"><h4>'.$v['caption'].'</h4></a>'.htmlspecialchars_decode($v['index_text'],ENT_QUOTES).'<div class="cl"></div></div>';
        }Cache_File::$cash->StartCache();echo $ind_article;Cache_File::$cash->StopCache('common/article.html');}else $ind_article='';}