<script async src="/js/common.php"></script>
<form id="addimg" class="form">

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
    <input type="text" id="productName" placeholder="Название продукта" size="80">
    <br>
    <br>
    <input type="text" placeholder="Штрих код продукта" size="80">
    <br>
    <br>
    <select id="arrMANUFACTURER" name="arrMANUFACTURER"><option value="" selected>Выбрать производителя</option>
        <?php
        $arrMANUFACTURER=\incl\uni\def\OptUni::MANUFACTURER;
        for($i=0;$i<count($arrMANUFACTURER);$i++){echo'<option value="'.$i.'">'.$arrMANUFACTURER[$i][0].'</option>';}?>
    </select>
    <br>
    <br>
    <select id="arrPROVIDER" name="arrPROVIDER"><option value="" selected>Выбрать поставщика</option>
        <?php
        $arrPROVIDER=\incl\uni\def\OptUni::PROVIDER;
        for($i=0;$i<count($arrPROVIDER);$i++){echo'<option value="'.$i.'">'.$arrPROVIDER[$i][0].'</option>';}?>
    </select>
    <br>
    <br>
    <input type="text" placeholder="Код продукта поставщика" size="80">
    <br>
    <br>
    <div id="nomInsAns"></div>
    <!--<input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="submit" value="Загрузить...">-->

</form> <button onclick="NomInsert();" >Загрузить...</button>


<script>
    function NomInsert(){
        if(document.getElementById('arrHEADING').value==''){
            alert("Не выбрана таблица ;-)");
        }else{

                ajaxPostSend("insert-nomenklature=1&arrHEADING="+document.getElementById('arrHEADING').value+
                                "&arrCATEGORY="+document.getElementById('arrCATEGORY').value+
                                "&productName="+document.getElementById('productName').value+
                //                "&o="+GetUserInfoView.o+
                //                "&tel="+GetUserInfoView.tel+
                //                "&tel2="+GetUserInfoView.tel2+
                //                "&mail="+GetUserInfoView.mail+
                //                "&level="+GetUserInfoView.level+
                //                "&note="+GetUserInfoView.note
                                ,callbackNomInsert,true,true,"/ajax/store/ajax_store.php");
            }
    }
    //document.getElementById('addimg').setAttribute("action",decodeURI(window.location.pathname));
    function setSection(){
        var date = new Date(new Date().getTime() + 60 * 5 * 1000);
        var x=parseInt(arrHEADING.value, 10)+1;
        document.cookie = "arrHEADING="+x+"; path=/; expires=" + date.toUTCString();
    }
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




    function callbackNomInsert(arr){
        alert(arr.answer);
        //modalloadFormAnswer("<p>"+arr.answer+"</p>");

    }

</script>