var my_protocol = window.location.protocol;
var my_host = window.location.hostname;
var referal = document.referrer;
var uri=decodeURI(window.location.pathname);
var adblock=false;
//*************************ajax**************************
function ajaxPostSend(urlparts, callback, json, asinc, url) {
    if (asinc === undefined) {
        asinc = true;
    }
    if (json === undefined) {
        json = true;
    }
    if (url === undefined) {
        url = "/ajax/site/postanswer.php";
    }

    var http = new XMLHttpRequest();
    http.open("POST",url, true);
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if(asinc){
        urlparts+='&catche=' + Math.random();
    }
    http.send(urlparts);
    http.onreadystatechange=function() {
        if (http.readyState == 4 && http.status == 200){
            if(json){ajaxPostErr(http.responseText,callback)}
            else{callback(http.responseText)}
        }
    }
    http.onerror=function () {
        alert('Извините, данные не были переданы. Проверьте подключение к интернету и обновите страницу...');
    }
}
function ajaxPostErr(answer,callback){
    var json=JSON.parse(answer);
    if(json.err){

        //alert(json.errText[0]);
        modalloadFormAnswer("<p>"+json.errText[0]+"</p>");

        /*try{if(document.getElementById("modalloadform")===null){modalloadclose();}
        }catch(e){modalloadclose();}*/
    }
    else{callback(json)}
}

function ajaxPostSendFile(url,file){
    var //file=document.getElementById("file"),
        http=new XMLHttpRequest(),
        form=new FormData();

    var upload_file=file.files[0];
    //form.append("table","1");
    form.append("imgfile",upload_file);


    http.upload.onprogress = function(event) {
        alert( 'Загружено на сервер ' + event.loaded + ' байт из ' + event.total );
    }

    http.upload.onload = function() {
        alert( 'Данные полностью загружены на сервер!' );
    }

    http.upload.onerror = function() {
        alert( 'Произошла ошибка при загрузке данных на сервер!' );
    }
    http.open("post",url,true);
    http.send(form);

}




//*************************Модальная форма**************************
function modalload(loadimg){
    var d=document.createElement("div");
    d.setAttribute("id","formBackShadow");
    d.setAttribute("class","form-back-shadow ac");
    if(loadimg!==undefined){
        var loaderDiv=document.createElement("div");
        loaderDiv.setAttribute("class","loader");
        d.appendChild(loaderDiv);
    }
    document.body.appendChild(d);
}
function modalloadForm(html,obj){
    modalload();
    if(html===undefined){html=null}
    var d=document.createElement("div");
    d.setAttribute("id","modalloadform");
    d.setAttribute("class","form");
    document.body.appendChild(d);

    var canvas=document.createElement("div");
    canvas.setAttribute("id","formLoadConvas");
    canvas.setAttribute("class","form-convas");
    d.appendChild(canvas);

    if(html!==null)canvas.innerHTML=html;
    if(obj!==undefined)canvas.appendChild(obj);

    var closeBtn=document.createElement("div");
    closeBtn.setAttribute("class","closex");
    closeBtn.innerHTML='X';
    d.appendChild(closeBtn);
    closeBtn.addEventListener("click",modalloadclose);
}

function modalloadFormAnswer(html,obj){
    formLoadConvas.removeChild(formLoadConvas.firstChild);

    if(html===undefined){html=null}
    var d=document.createElement("div");
    if(html!==null)d.innerHTML=html;
    if(obj!==undefined)d.appendChild(obj);
    formLoadConvas.insertBefore(d,formLoadConvas.firstChild);
}

function modalloadclose(){
    try{
        var e = document.getElementById("formBackShadow");
        e.parentNode.removeChild(e);
        if(modalloadform!==null){modalloadform.parentNode.removeChild(modalloadform);}
    }catch(e){}
}


//*************************Модальная форма End***********************

