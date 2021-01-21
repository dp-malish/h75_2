<form id="addimg" class="form" enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
    <input type="hidden" name="imgadd" value="1">
    <select id="tableimg" name="tableimg" onchange="setSection()"><option value="">Выбрать раздел</option>
        <?php
        $SqlTable='incl\\'.\lib\Def\Opt::$dir_name_site.'\def\SqlTable';
        for($i=0;$i<count($SqlTable::IMG);$i++){echo'<option value="'.$i.'">'.$SqlTable::IMG[$i][1].'</option>';}?>
    </select>
    <input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="submit" value="Загрузить (jpg/jpeg/png8)">
</form><script>function FileUpload(){if(document.getElementById('tableimg').value==''){alert("Не выбрана таблица ;-)");return false;}else{if(imgfile.value==""){alert("Файл не выбран ;-)");return false;}else return true;}}
    document.getElementById('addimg').setAttribute("action",decodeURI(window.location.pathname));
    function setSection(){
        var date = new Date(new Date().getTime() + 60 * 5 * 1000);
        var x=parseInt(tableimg.value, 10)+1;
        document.cookie = "imgsection="+x+"; path=/; expires=" + date.toUTCString();
    }
    var r=document.cookie.match("(^|;) ?imgsection=([^;]*)(;|$)");
    if(r)document.getElementById('tableimg').options[r[2]].selected=true;
</script>