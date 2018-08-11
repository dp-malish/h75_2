(function(){
    var http=new XMLHttpRequest();
    http.open("POST","/ajax/site/adframe.php",true);
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    http.send();
    http.onreadystatechange=function(){
        if(http.readyState==4&&http.status==200){
            document.cookie='_adnow=0; path=/;';//first load adBlock; Не используется сейчас adBlock;
            document.cookie='_id_l='+http.responseText+'; path=/;';
        }
    }
    http.onerror=function(){
        document.cookie='_adnow=1; path=/;';//first load adBlock; Используется сейчас adBlock;
        var date=new Date(new Date().getTime()+7*24*60*60*1000);//Неделя
        document.cookie='_flad=1; path=/; expires='+date.toUTCString();//first load adBlock; Использует adBlock;
    }

})();