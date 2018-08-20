<form class="form" action='' method='post' enctype='multipart/form-data'>
    <br><p>Выбирите раздел:</p>
    <select name="dbt"><option value="">Выбрать раздел</option><?php
        $dir='incl\\'.\lib\Def\Opt::$dir_name_site.'\Def\DownloadTable';
    $f=new $dir();
        foreach($f->d_arr as $v){echo'<option value="'.$v['id'].'">'.$v['menu_name'].'</option>';}
    ?></select>
    <br>
    <br><br><p>Выбирите файл:</p>
	<input type='file' name='upfile'><br><br>
	<input type='submit' name='send' value='загрузить'>
</form>