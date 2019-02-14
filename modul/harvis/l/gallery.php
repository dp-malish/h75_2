<?php
namespace lib\Def;

$msg=36;
try{if(Route::$count_uri_parts>2){throw new Exception();}else{$bad_link=0;
	Opt::$jscript.='<script async src="/js/jq.php"></script>';
	switch($uri_parts0_id[1]){
		case'каминов':Opt::$title='Галерея каминов - камины в Мариуполе';
            Opt::$description='Галерея каминов. Фотографии построенных нами каминов. Разнообразные примеры работ на все вкусы...';
            Opt::$keywords='галерея каминов, фотографии каминов, камины в Мариуполе, построить камин';
            $table_name='gallery_fireplace';
			$img_dir='fireplace';
			$caption='Галерея каминов';
			break;
		case'барбекю':Opt::$title='Галерея барбекю - барбекю в Мариуполе';
            Opt::$description='Галерея барбекю. Фотографии построенных нами барбекю. Разнообразные примеры работ на все вкусы...';
            Opt::$keywords='галерея барбекю, фотографии барбекю, барбекю в Мариуполе, построить барбекю';
		$table_name='gallery_barbecue';
		$img_dir='barbecue';
		$caption='Галерея барбекю';
		break;
		case'саун':Opt::$title='Галерея саун - сауны в Мариуполе';
            Opt::$description='Галерея саун. Фотографии построенных нами саун. Разнообразные примеры работ на все вкусы...';
            Opt::$keywords='галерея саун, фотографии саун, сауны в Мариуполе, построить сауну';
			$table_name='gallery_sauna';
			$img_dir='sauna';
			$caption='Галерея саун';
			break;
		case'бассейнов':Opt::$title='Галерея бассейнов - бассейны в Мариуполе';
            Opt::$description='Галерея бассейнов. Фотографии построенных нами бассейнов. Разнообразные примеры работ на все вкусы...';
            Opt::$keywords='галерея бассейнов, фотографии бассейнов, бассейны в Мариуполе, построить бассейнов, фото галерея бассейнов';
			$table_name='gallery_pool';
			$img_dir='pool';
			$caption='Галерея бассейнов';
			break;
		case'мрамора':Opt::$title='Галерея мрамора - мрамор в Мариуполе';
            Opt::$description='Галерея мрамора. Фотографии наших работ с использованием мрамора. Разнообразные примеры работ на все вкусы...';
            Opt::$keywords='галерея мрамора, фотографии мрамора, мрамор в Мариуполе, фото галерея мрамора';
			$table_name='gallery_marble';
			$img_dir='marble';
			$caption='Галерея мрамора';
			break;
		case'плитки':Opt::$title='Галерея керамической плитки - плитка в Мариуполе';
            Opt::$description='Галерея керамической плитки. Огромный выбор керамической плитки. Низкие цены! Фотографии наших работ с использованием керамической плитки.';
            Opt::$keywords='галерея керамической плитки, галерея плитки, фотографии керамической плитки, керамическая плитка в Мариуполе, фото галерея плитки';
			$table_name='gallery_tile';
			$img_dir='tile';
			$caption='Галерея керамической плитки';
			break;
		case'потолков':Opt::$title='Галерея натяжных потолков - натяжные потолки в Мариуполе';
            Opt::$description='Галерея натяжных потолков. Наша компания на протяжении многих лет успешно занимается установкой и ремонтом натяжных потолков. Безупречная репутация фирмы и значительный опыт работы делают нас лидерами в отрасли..';
            Opt::$keywords='галерея натяжных потолков, галерея потолков, фотографии натяжных потолков, натяжные потолки в Мариуполе, фото галерея плиткинатяжных потолков';
			$table_name='gallery_ceiling';
			$img_dir='ceiling';
			$caption='Галерея натяжных потолков';
			break;
		case'водоёмов':Opt::$title='Галерея водоёмов - водоёмы в Мариуполе';
            Opt::$description='Галерея водоёмов. Наша компания на протяжении многих лет успешно занимается проектировкой и постройкой водоёмов. Безупречная репутация фирмы и значительный опыт работы делают нас лидерами в отрасли..';
            Opt::$keywords='галерея водоёмов, фотографии водоёмов, водоёмы в Мариуполе, фото галерея водоёмов';
			$table_name='gallery_reservoirs';
			$img_dir='reservoirs';
			$caption='Галерея водоёмов';
			break;
		default:Route::$module404=true;$bad_link=1;
	}
if(!isset(Route::$uri_parts[1])&& !$bad_link){
	$DB=new SQLi();Str_navigation::navigation(Route::$uri_parts[0],$table_name,1,$msg,true);
	Opt::$main_content.=Str_navigation::$navigation.'<article><div class="fon_c"><h3>'.$caption.'</h3><div class="cl"></div></div><div class="dwfe">';
	$res=$DB->arrSQL('SELECT id,caption,img,img_alt,img_title,short_text,price,view,link_turn FROM '.$table_name.' ORDER BY link_turn,id DESC LIMIT '.$msg);
	foreach($res as $k=>$v){
		if($v['view']){
			$img='<a rel="group_one" class="colorbox" href="/img/'.$img_dir.'/pic.php?id='.$v['img'].'" title="'.$v['caption'].'"><img class="br" src="/img/'.$img_dir.'/pic.php?id='.$v['img'].'" alt="'.$v['img_alt'].'" title="'.$v['img_title'].'"></a>';
			$price=($v['price']!=''?'<span class="price fr">Цена: '.$v['price'].' $</span>':'');
			Opt::$main_content.='<div class="fon_c gallery five_"><section><span>'.$img.'</span><h4>'.$v['caption'].'</h4><span class="ac">'.htmlspecialchars_decode($v['short_text'],ENT_QUOTES).$price.'</span></section><div class="cl"></div></div>';
		}
	}
	Opt::$main_content.='</div><div class="cl"></div></article>'.Str_navigation::$navigation;
}elseif(isset(Route::$uri_parts[1])&& !$bad_link){
			if(preg_match("/^[0-9]+$/u",Route::$uri_parts[1])){$DB=new SQLi();
			Str_navigation::navigation(Route::$uri_parts[0],$table_name, Route::$uri_parts[1], $msg,true);
				Opt::$title.=' раздел '.Route::$uri_parts[1];
                Opt::$description.=' Подробнее в разделе '.Route::$uri_parts[1].'.';
				Opt::$main_content.=Str_navigation::$navigation.'<article><div class="fon_c"><h3>'.$caption.'</h3><div class="cl"></div></div><div class="dwfe">';
				$res=$DB->arrSQL('SELECT id,caption,img,img_alt,img_title,short_text,price,view,link_turn FROM '.$table_name.' ORDER BY link_turn,id DESC LIMIT '.Str_navigation::$start_nav.','.$msg);
				foreach($res as $k=>$v){
					if($v['view']){
						$img='<a rel="group_one" class="colorbox" href="/img/'.$img_dir.'/pic.php?id='.$v['img'].'" title="'.$v['caption'].'"><img class="br" src="/img/'.$img_dir.'/pic.php?id='.$v['img'].'" alt="'.$v['img_alt'].'" title="'.$v['img_title'].'"></a>';
						$price=($v['price']!=''?'<span class="price fr">Цена: '.$v['price'].' $</span>':'');
						Opt::$main_content.='<div class="fon_c gallery five_"><section><span class="">'.$img.'</span><h4>'.$v['caption'].'</h4><span class="ac">'.htmlspecialchars_decode($v['short_text'],ENT_QUOTES).$price.'</span></section><div class="cl"></div></div>';
					}
				}
				Opt::$main_content.='</div><div class="cl"></div></article>'.Str_navigation::$navigation;
			}else $bad_link=1;
}//*****
	if($bad_link){Route::$module404=true;}
}//else $count_uri_parts
}catch(Exception $e){Route::$module404=true;}