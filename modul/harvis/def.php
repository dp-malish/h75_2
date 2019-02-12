<?php
try{if($count_uri_parts>1){throw new Exception();}else{
if(!preg_match("/^[0-9а-яёa-z\-]+$/u",$uri_parts[0])){$module='404';}else{$DB=new SQLi();
	$res=$DB->strSQL('SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text FROM default_content WHERE link='.$DB->realEscapeStr($uri_parts[0]));
	if($res){$title=$res['title'];$description=$res['meta_d'];$keywords=$res['meta_k'];
	if($res['img']!=''){$img='<img class="fl five" src="/img/site/dbpic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
	$main_content.='<div class="fon_c"><article><h3>'.$res['caption'].'</h3>'.$img.htmlspecialchars_decode($res['full_text'],ENT_QUOTES).'</article><div class="cl"></div></div>';
	}else{$module='404';}
}}}catch(Exception $e){$module='404';}