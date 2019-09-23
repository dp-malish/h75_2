



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
    canvas.setAttribute("id","form-convas");
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

function modalloadclose(){
    try{
        var e = document.getElementById("formBackShadow");
        e.parentNode.removeChild(e);
        if(modalloadform!==null){modalloadform.parentNode.removeChild(modalloadform);}
    }catch(e){}
}




//*************************Модальная форма End***********************


//temp
//document.getElementById("pulseBtn").addEventListener("click",function (){modalload()},false);
document.getElementById("pulseBtn").addEventListener("click",function(){

    var form=document.createElement("form");
    form.id = "formCallBack";
    form.innerHTML="<h4>Мы Вам перезвоним</h4>";
    form.addEventListener("click", function(event){event.preventDefault();});

    var d=document.createElement("div");
    d.setAttribute("class","form-input form-icon-men");
    form.appendChild(d);
    var Login = document.createElement("input");
    Login.id="formCallBackName";
    Login.name="username";
    Login.type="text";
    Login.size="13";
    Login.title="Введите Ваше имя";
    Login.placeholder="Ваше имя";
    Login.setAttribute("required","");
    d.appendChild(Login);

    d=document.createElement("div");
    d.setAttribute("class","form-input form-icon-tel");
    form.appendChild(d);
    var tel = document.createElement("input");
    tel.id="formCallBackTel";
    tel.name="tel";
    tel.type="text";
    tel.size="13";
    tel.title="Введите номер телефона";
    tel.placeholder="Номер телефона";
    tel.setAttribute("required","");
    d.appendChild(tel);

    var submitBtn=document.createElement("input");
    submitBtn.id="formCallBackSubmit";
    submitBtn.name="submit";
    submitBtn.setAttribute("class","form-submit");
    submitBtn.type="submit";
    submitBtn.value="Перезвоните мне";
    submitBtn.addEventListener("click",formCallBackSubmit);
    form.appendChild(submitBtn);

    modalloadForm(null,form);

},false);



function formCallBackSubmit(){

    alert('3');

}
