<form id="updimg" class="form" enctype="multipart/form-data" method="post" onsubmit="return FileUpload();">
    <input type="hidden" name="imgupd" value="1">
    <select id="tableimg" name="tableimg"><option value="">Выбрать раздел</option>
        <?php
        $SqlTable='incl\\'.\lib\Def\Opt::$dir_name_site.'\SqlTable';
        for($i=0;$i<count($SqlTable::IMG);$i++){echo'<option value="'.$i.'">'.$SqlTable::IMG[$i][1].'</option>';}?>
    </select>
    <div id="htmlimg" class="ac five"></div>
    <div id="showimg" class="ac scry five"></div><div class="cl"></div>
    <input type="file" id="imgfile" name="imgfile" accept="image/jpeg,image/png">
    <input type="hidden" id="imgnumber" name="imgnumber" value="1">
    <div id="karuselimg" class="karuselimg"></div>
    <div class="cl"></div>

    <input type="submit" value="Заменить (jpg/jpeg/png8)">
</form>

<script>var imgOpt=[];
    document.getElementById("tableimg").addEventListener("change",function(){
        karuselimg.scrollLeft=0;
        if(tableimg.value!=""){
            if(imgOpt[tableimg.value]==undefined){
                answerFeedback.t=tableimg.value;
                var sendurl="t="+tableimg.value;
                ajaxPostSend(sendurl,answerFeedback,true,true,'/img/site/admin.php');
            }else{
                preView();ranKarusel();
            }
        }else{showimg.innerHTML="";showimg.style.height="0";karuselimg.innerHTML="";karuselimg.style.height="0";htmlimg.innerHTML="";}
    },false);

    function answerFeedback(arr){
        var obj={};
        obj.dir=arr.dir;
        obj.maxid=arr.maxid;
        imgOpt[answerFeedback.t]=obj;
        preView();ranKarusel()
    }

    function preView(){
        if(imgOpt[tableimg.value]!==undefined){
            imgnumber.value=imgOpt[tableimg.value].maxid;
            //imgnumber.setAttribute("max",imgOpt[tableimg.value].maxid);
            var img_cod='<img src="'+imgOpt[tableimg.value].dir+imgOpt[tableimg.value].maxid+'" alt="">';
            showimg.innerHTML=img_cod;
            showimg.style.height="180px";
            showimg.firstChild.style.maxWidth="250px";
            htmlimg.innerHTML="<xmp>"+img_cod+"</xmp>";
        }
    }

    function ranKarusel(){
        var img_cod="";
        if(ranKarusel.step==undefined){ranKarusel.step=10}
        else{ranKarusel.step+=10}
        var step=imgOpt[tableimg.value].maxid-ranKarusel.step;
        if(step<1)step=0;
        for(var i=imgOpt[tableimg.value].maxid;step<i;i--){
        img_cod+='<img src="'+imgOpt[tableimg.value].dir+i+'" alt="'+i+'" title="Изображение №'+i+'" onclick="preViewKar(this)">';
        }
        karuselimg.innerHTML=img_cod;
        karuselimg.style.height="100px";
    }
    function preViewKar(res){
        imgnumber.value=res.alt;
        res=res.src.split(my_host)[1];
        showimg.innerHTML='<img src="'+res+'" alt="">';
        showimg.firstChild.style.maxWidth="250px";
        htmlimg.innerHTML="<xmp><img src='"+res+"' alt=''></xmp>";
    }

    karuselimg.addEventListener("scroll",function(){
        if((karuselimg.scrollWidth-karuselimg.scrollLeft)<630)ranKarusel();
    });

    document.getElementById('updimg').setAttribute("action",decodeURI(window.location.pathname));

    function FileUpload(){if(document.getElementById('tableimg').value==''){alert("Не выбрана таблица ;-)");return false;}else{if(imgfile.value==""){alert("Файл не выбран ;-)");return false;}else return true;}}
</script>