function getUserInfo(id){


    ajaxPostSend("info_user=1&id="+id,callbackGetUserInfo,true,true,"/ajax/site/login.php");
    //alert(id);
/*    var formLogin=document.createElement("form");
    formLogin.id = "formLoginUser";
    formLogin.className = "form";
    formLogin.innerHTML="<h4>Вход</h4>";

    var mailLogin = document.createElement("input");
    mailLogin.id="btnUserEmail";
    mailLogin.type = "email";
    mailLogin.size = "95";
    mailLogin.title = "Email для входа";
    mailLogin.placeholder = "login@gmail.com";
    mailLogin.setAttribute("required","");
    formLogin.appendChild(mailLogin);

    mailLogin = document.createElement("input");
    mailLogin.id="btnUserPass";
    mailLogin.type = "password";
    mailLogin.size = "40";
    mailLogin.title = "Пароль для входа";
    mailLogin.placeholder = "Пароль для входа";
    mailLogin.setAttribute("required","");
    formLogin.appendChild(mailLogin);

    mailLogin = document.createElement("input");
    mailLogin.id="btnUserLogin";
    mailLogin.type = "submit";
    mailLogin.value = "Войти";
    mailLogin.addEventListener("click",userLogin);
    formLogin.appendChild(mailLogin);*/


}

//modalloadForm(null,formLogin);
/*function userLogin(){

    document.getElementById("formLoginUser").addEventListener("click", function(event){event.preventDefault();});

    if(document.getElementById("btnUserEmail").value==""){document.getElementById("btnUserEmail").focus();
    }else if(document.getElementById("btnUserPass").value==""){document.getElementById("btnUserPass").focus();
    }else{
        document.getElementById("btnUserLogin").disabled=true;

        ajaxPostSend("login=1&mail="+document.getElementById("btnUserEmail").value+"&pass="+document.getElementById("btnUserPass").value,callbackUserLogin,true,true,"/ajax/site/login.php");

        document.getElementById("btnUserLogin").disabled=false;
    }
}*/
function callbackGetUserInfo(arr){
    alert(arr.id+"   "+arr.mail);

/*    if(arr.answer==1){
        //modalloadclose();
        //document.getElementById("login_btn").remove();

    }else */
//modalloadFormAnswer("<p>"+arr.answer+"</p>");

}