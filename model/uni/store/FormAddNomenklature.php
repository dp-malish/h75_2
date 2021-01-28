<form id="addimg" class="form" enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
    <input type="hidden" name="imgadd" value="1">
    <select id="arrHEADING" name="arrHEADING" onchange="setSection()"><option value="">Выбрать заголовка</option>
        <?php
        $arrHEADING=\incl\uni\def\OptUni::HEADING;
        for($i=0;$i<count($arrHEADING);$i++){echo'<option value="'.$i.'">'.$arrHEADING[$i][0].'</option>';}?>
    </select>
    <br>
    <br>
    <select id="arrCATEGORY" name="arrCATEGORY"><option value="" selected>Выбрать категорию</option>
        <?php
        $arrCATEGORY=\incl\uni\def\OptUni::CATEGORY;
        for($i=0;$i<count($arrCATEGORY);$i++){echo'<option value="'.$i.'">'.$arrCATEGORY[$i][0].'</option>';}?>
    </select>
    <br>
    <br>
    <input type="text" placeholder="Название продукта" size="88">
    <br>
    <br>

    <!--<input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="submit" value="Загрузить (jpg/jpeg/png8)">-->
</form>


<script>
    function FileUpload(){
        if(document.getElementById('arrHEADING').value==''){
            alert("Не выбрана таблица ;-)");return false;
        }else{
            if(imgfile.value==""){
                alert("Файл не выбран ;-)");return false;
            }else return true;}
    }
    //document.getElementById('addimg').setAttribute("action",decodeURI(window.location.pathname));
    function setSection(){
        var date = new Date(new Date().getTime() + 60 * 5 * 1000);
        var x=parseInt(arrHEADING.value, 10)+1;
        document.cookie = "arrHEADING="+x+"; path=/; expires=" + date.toUTCString();
    }
    //alert(document.cookie); // показываем все куки
    //var r=document.cookie.match("(^|;) ?imgsection=([^;]*)(;|$)");
    // возвращает куки с указанным name,
    // или undefined, если ничего не найдено
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    var r=getCookie("arrHEADING");

    if(r!="NaN")document.getElementById('arrHEADING').options[r].selected=true;
    else alert('Заголовок не забит :-)');
</script>