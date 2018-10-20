function getUserInfo(id){

    modalload(loaderImg);

    ajaxPostSend("info_user=1&id="+id,callbackGetUserInfo,true,true,"/ajax/site/login.php");

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
    modalloadclose();

    var canvas=document.createElement("div");
    //группа id
    var d=document.createElement("div");

    var d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="№";
    d.appendChild(d_left);
    var d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.id;
    d.appendChild(d_right);
    var cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d.appendChild(cl);
    canvas.appendChild(d);
    callbackGetUserInfo.id=arr.id;

    //группа ФИО
    d_fio=document.createElement("div");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="ФИО";
    d_fio.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.fio;
    d_fio.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_fio.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_fio);
    //callbackGetUserInfo.id=arr.id;

    //группа telephone
    d_tel=document.createElement("div");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Телефон";
    d_tel.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.tel;
    d_tel.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_tel.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_tel);

    //группа telephone 2
    d_tel2=document.createElement("div");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Телефон";
    d_tel2.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.tel2;
    d_tel2.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_tel2.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_tel2);


    //группа email
    d_email=document.createElement("div");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Email";
    d_email.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.mail;
    d_email.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_email.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_email);


    //группа role
    d_role=document.createElement("div");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Доступ";
    d_role.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.role;
    d_role.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_role.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_role);


    //группа дата регистрации
    d_reg=document.createElement("div");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Дата регистрации";
    d_reg.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=arr.data;
    d_reg.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_reg.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_reg);


    //"<p>"+arr.id+"   "+arr.mail+"</p>"
    modalloadForm(null,canvas);

    alert(callbackGetUserInfo.id)

}