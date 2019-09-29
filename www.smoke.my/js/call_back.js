/*Кнопка перезвони мне*/

window.addEventListener("load", function(){

    document.getElementById("pulseBtn").addEventListener("click",function(){
        formCalBackViewl();
    },false);
    document.getElementById("fast_order_btn").addEventListener("click",function(){
        formCalBackViewl();
    },false);

},true);

function formCalBackViewl(){
    try{
    var form=document.createElement("form");
    form.id="formCallBack";
    form.innerHTML="<h4>Мы Вам перезвоним</h4>";
    form.addEventListener("click", function(event){event.preventDefault();});

    var d=document.createElement("div");
    d.setAttribute("class","form-input form-icon-men");
    form.appendChild(d);
    var Login=document.createElement("input");
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
    var tel=document.createElement("input");
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
    }catch(e){}
}

function formCallBackSubmit(){
    if(document.getElementById("formCallBackName").value==""){document.getElementById("formCallBackName").focus();
    }else if(document.getElementById("formCallBackTel").value==""){document.getElementById("formCallBackTel").focus();
    }else{
        document.getElementById("formCallBackSubmit").disabled=true;
        ajaxPostSend("call_me=1&name="+document.getElementById("formCallBackName").value+
            "&tel="+document.getElementById("formCallBackTel").value,formCallBackSubmitAnswer,true,true,"/ajax/call_back/call.php");
        document.getElementById("formCallBackSubmit").disabled=false;
    }
}

function formCallBackSubmitAnswer(arr){
    /*alert(arr.answer);*/
    modalloadFormAnswer("<p>"+arr.answer+"</p>");
}