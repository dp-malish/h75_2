(function(){
    var http=new XMLHttpRequest();
    http.open("POST","/ajax/site/adframe.php",true);
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    http.send();
    http.onreadystatechange=function(){
        if(http.readyState==4&&http.status==200){
            document.cookie='_adnow=0';//first load adBlock; Не используется сейчас adBlock;
            document.cookie='_id_l='+http.responseText;
        }
    }
    http.onerror=function(){
        document.cookie='_adnow=1';//first load adBlock; Используется сейчас adBlock;
        document.cookie='_flad=1';//first load adBlock; Использует adBlock;
    }

})();