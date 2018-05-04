<?php
namespace lib\Def;
$fish_menu=Cache_File::$cash->IsSetCacheFile('common/fish_menu.html');
if($fish_menu=='0'){
  $res=SQListatic::arrSQL_('SELECT links,fish FROM reference_fish WHERE menu=1 ORDER BY link_turn');
  foreach($res as $k=>$v){$fish_link[]=$v["links"];$fish_name[]=$v["fish"];}
$result_str=count($fish_name);
if($result_str>0){Cache_File::$cash->StartCache();
//***********
$fish_menu='<div class="fon"><div class="fon_head"><h4>Ловля рыбы:</h4></div><nav><ul id="fish_menu">';
for($i=0;$i<$result_str;$i++){
	$fish_menu.='<li><div>'.$fish_name[$i].'</div><ul>';
	$res=SQListatic::arrSQL_('SELECT links_child,links_name FROM fish_article WHERE links=\''.$fish_link[$i].'\' ORDER BY link_turn');
  foreach($res as $k=>$v){$fish_menu.='<li><a href="/fish/'.$v["links_child"].'">'.$v["links_name"].'</a></li>';}
  $fish_menu.='</ul></li>';
}
$fish_menu.='</ul></nav></div>';
//***********
echo $fish_menu;
  Cache_File::$cash->StopCache('common/fish_menu.html');
}// End if($result_str > 0)
}//if($fish_menu == '0')
Opt::$r_content.=$fish_menu;