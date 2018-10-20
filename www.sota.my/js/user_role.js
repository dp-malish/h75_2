function addUserInfoNew() {
    GetUserInfoView.id=null;
    GetUserInfoView.f=null;
    GetUserInfoView.i=null;
    GetUserInfoView.o=null;
    GetUserInfoView.tel=null;
    GetUserInfoView.tel2=null;
    GetUserInfoView.mail=null;

    GetUserInfoView();
}


function getUserInfo(id){

    modalload(loaderImg);

    ajaxPostSend("info_user=1&id="+id,callbackGetUserInfo,true,true,"/ajax/site/login.php");

}



function callbackGetUserInfo(arr){
    modalloadclose();
    GetUserInfoView.id=arr.id;
    GetUserInfoView.f=arr.f;
    GetUserInfoView.i=arr.i;
    GetUserInfoView.o=arr.o;
    GetUserInfoView.tel=arr.tel;
    GetUserInfoView.tel2=arr.tel2;
    GetUserInfoView.mail=arr.mail;

    GetUserInfoView();
}

function GetUserInfoView() {
    var canvas=document.createElement("div");
    //группа id
    var d=document.createElement("div");
    d.setAttribute("class","five");
    var d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="№";
    d.appendChild(d_left);
    var d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    if(GetUserInfoView.id != null){d_right.innerHTML=GetUserInfoView.id;}
    else{d_right.innerHTML="_____";}
    d.appendChild(d_right);
    var cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d.appendChild(cl);
    canvas.appendChild(d);


    //группа ФИО
    d_fio=document.createElement("div");
    d_fio.setAttribute("class","five");
    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="ФИО";
    d_fio.appendChild(d_left);
    //**
    d_right=document.createElement("div");
    d_right.setAttribute("id","user_f");
    d_right.setAttribute("class","al ff fr mb link");
    if(GetUserInfoView.f != null){d_right.innerHTML=GetUserInfoView.f;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Указать фамилию",(GetUserInfoView.f!=null?GetUserInfoView.f:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.f=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.f=null;}
        }
    };
    //**
    d_fio.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_fio.appendChild(cl);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr mb link");
    if(GetUserInfoView.i != null){d_right.innerHTML=GetUserInfoView.i;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Указать фамилию",(GetUserInfoView.i!=null?GetUserInfoView.i:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.i=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.i=null;}
        }
    };
    d_fio.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_fio.appendChild(cl);
    //**
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr mb link");
    if(GetUserInfoView.o != null){d_right.innerHTML=GetUserInfoView.o;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Указать фамилию",(GetUserInfoView.o!=null?GetUserInfoView.o:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.o=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.o=null;}
        }
    };
    d_fio.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_fio.appendChild(cl);
    canvas.appendChild(d_fio);


    //группа telephone
    d_tel=document.createElement("div");
    d_tel.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Телефон";
    d_tel.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr link");
    //d_right.innerHTML=arr.tel+" <span class='link'>&#9997;</span>";
    d_tel.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_tel.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_tel);

    //группа telephone 2
    d_tel2=document.createElement("div");
    d_tel2.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Телефон";
    d_tel2.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    //d_right.innerHTML=arr.tel2;
    d_tel2.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_tel2.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_tel2);


    //группа email
    d_email=document.createElement("div");
    d_email.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Email";
    d_email.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    //d_right.innerHTML=arr.mail;
    d_email.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_email.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_email);


    //группа role
    d_role=document.createElement("div");
    d_role.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Доступ";
    d_role.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    //d_right.innerHTML=arr.role;
    d_role.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_role.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_role);


    //группа дата регистрации
    d_reg=document.createElement("div");
    d_reg.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Дата регистрации";
    d_reg.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    //d_right.innerHTML=arr.data;
    d_reg.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_reg.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_reg);


    //"<p>"+arr.id+"   "+arr.mail+"</p>"
    modalloadForm(null,canvas);

    //alert(callbackGetUserInfo.id)
}