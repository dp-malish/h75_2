function addUserInfoNew() {
    GetUserInfoView.id=null;
    GetUserInfoView.f=null;
    GetUserInfoView.i=null;
    GetUserInfoView.o=null;
    GetUserInfoView.tel=null;
    GetUserInfoView.tel2=null;
    GetUserInfoView.mail=null;
    GetUserInfoView.role=null;

    GetUserInfoView.level=null;
    GetUserInfoView.note=null;

    GetUserInfoView.data=null;
    GetUserInfoView();
}

function getUserInfo(id){modalload(loaderImg);
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
    GetUserInfoView.role=arr.role;

    GetUserInfoView.level=arr.level;
    GetUserInfoView.note=arr.note;

    GetUserInfoView.data=arr.data;
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
    var d_fio=document.createElement("div");
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
        document.getElementById("user_save_btn").style.display="block";
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
        var x=prompt("Указать имя",(GetUserInfoView.i!=null?GetUserInfoView.i:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.i=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.i=null;}
        }document.getElementById("user_save_btn").style.display="block";
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
        var x=prompt("Указать отчество",(GetUserInfoView.o!=null?GetUserInfoView.o:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.o=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.o=null;}
        }document.getElementById("user_save_btn").style.display="block";
    };
    d_fio.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_fio.appendChild(cl);
    canvas.appendChild(d_fio);


    //группа telephone
    var d_tel=document.createElement("div");
    d_tel.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Телефон";
    d_tel.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr link");
    if(GetUserInfoView.tel != null){d_right.innerHTML=GetUserInfoView.tel;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Указать телефон (без тире и пробелов)",(GetUserInfoView.tel!=null?GetUserInfoView.tel:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.tel=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.tel=null;}
        }document.getElementById("user_save_btn").style.display="block";
    };
    d_tel.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_tel.appendChild(cl);

    //крайняя див который всё содержит
    canvas.appendChild(d_tel);

    //группа telephone 2
    var d_tel2=document.createElement("div");
    d_tel2.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Телефон";
    d_tel2.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr link");
    if(GetUserInfoView.tel2 != null){d_right.innerHTML=GetUserInfoView.tel2;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Указать доп. телефон (без тире и пробелов)",(GetUserInfoView.tel2!=null?GetUserInfoView.tel2:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.tel2=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.tel2=null;}
        }document.getElementById("user_save_btn").style.display="block";
    };
    d_tel2.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_tel2.appendChild(cl);
    canvas.appendChild(d_tel2);


    //группа email
    var d_email=document.createElement("div");
    d_email.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Email";
    d_email.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr link");
    if(GetUserInfoView.mail!=null){d_right.innerHTML=GetUserInfoView.mail;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Указать email",(GetUserInfoView.mail!=null?GetUserInfoView.mail:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.mail=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.mail=null;}
        }document.getElementById("user_save_btn").style.display="block";
    };
    d_email.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_email.appendChild(cl);
    canvas.appendChild(d_email);


    //группа role
    var d_role=document.createElement("div");
    d_role.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Доступ";
    d_role.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    d_right.innerHTML=GetUserInfoView.role;
    if(GetUserInfoView.role!=null){d_right.innerHTML=GetUserInfoView.role;}
    else{d_right.innerHTML="";}
    d_role.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_role.appendChild(cl);
    canvas.appendChild(d_role);

    //групп Отношение клиента
    var d_level=document.createElement("div");
    d_level.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Отношение клиента";
    d_level.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr link");
    if(GetUserInfoView.level!=null){d_right.innerHTML=GetUserInfoView.level;}
    else{d_right.innerHTML="";}
    d_right.onclick=function(){
        var x=prompt("Оценить отношение клиента (цифра от 1 до 5)",(GetUserInfoView.level!=null?GetUserInfoView.level:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.level=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.level=null;}
        }document.getElementById("user_save_btn").style.display="block";
    };
    d_level.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_level.appendChild(cl);
    canvas.appendChild(d_level);

    //*****
    //группа note
    var d_note=document.createElement("div");
    d_note.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Примечание";
    d_note.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr link");
    if(GetUserInfoView.note!=null){d_right.innerHTML=GetUserInfoView.note;}
    else{d_right.innerHTML="<span>&#9997;</span>";}
    d_right.onclick=function(){
        var x=prompt("Заполнить примечание",(GetUserInfoView.note!=null?GetUserInfoView.note:""));
        if(x!==null){
            if(x!=""){this.innerHTML=x;GetUserInfoView.note=x;
            }else{this.innerHTML="<span>&#9997;</span>";GetUserInfoView.note=null;}
        }document.getElementById("user_save_btn").style.display="block";
    };
    d_note.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_note.appendChild(cl);
    canvas.appendChild(d_note);

    //группа дата регистрации
    var d_reg=document.createElement("div");
    d_reg.setAttribute("class","five");

    d_left=document.createElement("div");
    d_left.setAttribute("class","ar ff fl");
    d_left.innerHTML="Дата регистрации";
    d_reg.appendChild(d_left);
    d_right=document.createElement("div");
    d_right.setAttribute("class","al ff fr");
    if(GetUserInfoView.data!=null){d_right.innerHTML=GetUserInfoView.data;}
    else{d_right.innerHTML="";}
    d_reg.appendChild(d_right);
    cl=document.createElement("div");
    cl.setAttribute("class","cl");
    d_reg.appendChild(cl);
    canvas.appendChild(d_reg);

    //кнопка сохранить
    var d_btn=document.createElement("div");
    d_btn.setAttribute("id","user_save_btn");
    d_btn.setAttribute("class","five ac hide");

    var btn=document.createElement("input");

    btn.setAttribute("type","button");
    btn.setAttribute("value","Сохранить изменения");
    btn.onclick=function(){
        var x=confirm("Внести изменения?");
        if(x){ajaxPostSend("add_update=1&id="+GetUserInfoView.id+
                "&f="+GetUserInfoView.f+
                "&i="+GetUserInfoView.i+
                "&o="+GetUserInfoView.o+
                "&tel="+GetUserInfoView.tel+
                "&tel2="+GetUserInfoView.tel2+
                "&mail="+GetUserInfoView.mail+
                "&level="+GetUserInfoView.level+
                "&note="+GetUserInfoView.note
                ,callbackAddUserInfoNew,true,true,"/ajax/site/login.php");
        }
    };

    d_btn.appendChild(btn);
    canvas.appendChild(d_btn);

    modalloadForm(null,canvas);
}

function callbackAddUserInfoNew(arr){
    alert(arr.answer);

}