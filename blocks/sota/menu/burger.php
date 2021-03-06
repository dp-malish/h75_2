<?php
/**
 * 0 - без входа
 * 1 - я
 * 2 - директор
 * 3 - бухгалтер
 * 4 - менеджер
 * 5 - продавец
 * 6 - клиент
 * 7 - SU
 * INSERT INTO `user_group` (`user_group_id`, `name`, `permission`) VALUES
(1, 'Admin', NULL),
(2, 'Director', NULL),
(3, 'Accountant', NULL),
(4, 'Manager', NULL),
(5, 'Seller', NULL),
(6, 'Client', NULL),
(7, 'SU', NULL);
 */
//\lib\Def\Opt::$live_user=1;
$menu=[

    'burger'=>[
        ['link'=>'сервис','title'=>'Сервис','def'=>true,'hiden'=>false,'role'=>[1,6,7]],
        ['link'=>'ремонт','title'=>'Ремонт','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
        ['link'=>'сайты','title'=>'Сайты','def'=>true,'hiden'=>false,'role'=>[1,6,7]],
        ['link'=>'магазин','title'=>'Магазин','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
        ['link'=>'контакты','title'=>'Контакты','def'=>true,'hiden'=>false,'role'=>[4,5,6]],

        ['link'=>'сделай-сам','title'=>'Сделай сам','def'=>true,'hiden'=>false,'role'=>[1,6,7]],

        ['link'=>'директор','title'=>'Директор','def'=>false,'hiden'=>true,'role'=>[1,2,7]],
        ['link'=>'бухгалтер','title'=>'Бухгалтер','def'=>false,'hiden'=>true,'role'=>[1,3,7]],
        ['link'=>'менеджер','title'=>'Менеджер','def'=>false,'hiden'=>false,'role'=>[1,4,7]],
        ['link'=>'продавец','title'=>'Продавец','def'=>false,'hiden'=>false,'role'=>[1,5,7]]
    ],

    'main_menu'=>[
        ['link'=>'заказы','title'=>'Заказы','def'=>false,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
        ['link'=>'директор','title'=>'Директор','def'=>false,'hiden'=>true,'role'=>[1,2,7]],
        ['link'=>'бухгалтер','title'=>'Бухгалтер','def'=>false,'hiden'=>true,'role'=>[1,3,7]],
        ['link'=>'менеджер','title'=>'Менеджер','def'=>false,'hiden'=>false,'role'=>[1,4,7]],
        ['link'=>'продавец','title'=>'Продавец','def'=>false,'hiden'=>false,'role'=>[1,5,7]],


        ['link'=>'exit','title'=>'Выход','def'=>false,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]]
    ]


];

$burger='<div class="main_menu rel">
    <div id="burger" class="burger rel">
        <div><div class="burger_line"></div><div class="burger_line"></div><div class="burger_line"></div></div>
        <div id="burger_menu" class="burger_canvas">
            <nav><ul class="top_menu_m">';
if(\lib\Def\Opt::$live_user==0){
    foreach($menu['burger'] as $v){
        if($v['def'])$burger.='<li><a href="/'.$v['link'].'">'.$v['title'].'</a></li>';
    }
}else{
    foreach($menu['burger'] as $v){
        if($v['def']){
            if($v['def'])$burger.='<li><a href="/'.$v['link'].'">'.$v['title'].'</a></li>';
        }else{
        foreach($v['role'] as $role){
            if($role==\lib\Def\Opt::$live_user)
                $burger.='<li><a href="/'.($v['hiden']?\lib\Def\Opt::$setting.'/':'cabinet/').$v['link'].'">'.$v['title'].'</a></li>';
        }
        }
    }
}
$burger.='</ul></nav>
        </div>
    </div>
    <div id="main_menu_pc">
        <nav>
            <ul class="top_menu_pc">
                <li><a href="/">Главная</a></li>

                <li><a href="сервис" class="top_menu_pc_down">Сервис</a>
                    <ul class="top_menu_pc_submenu">
                        <li><a href="">Сборка компьютера</a></li>
                        <li><a href="">Чистка</a></li>
                        <li><a href="">Author</a></li>
                        <li><a href="">Archive</a></li>
                        <li><a href="">Tags</a></li>
                    </ul>
                </li>

                <li><a href="" class="top_menu_pc_down">Ремонт</a>
                    <ul class="top_menu_pc_submenu">
                        <li><a href="">Category</a></li>
                        <li><a href="">Author</a></li>
                        <li><a href="">Archive</a></li>
                        <li><a href="">Tags</a></li>
                    </ul>
                </li>

                <li><a href="" class="top_menu_pc_down">Сайты</a>
                    <ul class="top_menu_pc_submenu">
                        <li><a href="">Category</a></li>
                        <li><a href="">Author</a></li>
                        <li><a href="">Archive</a></li>
                        <li><a href="">Tags</a></li>
                    </ul>
                </li>
                <li><a href="">Магазин</a></li>
                <li><a href="">Контакты</a></li>';


if(\lib\Def\Opt::$live_user!=0){
    $burger.='<li><a href="/cabinet/" class="top_menu_pc_down">Кабинет</a><ul class="top_menu_pc_submenu">';
    foreach($menu['main_menu'] as $v){
        foreach($v['role'] as $role){
            if($role==\lib\Def\Opt::$live_user){
                if(\lib\Def\Opt::$loginAdmin){
                    $burger.='<li><a href="/'.($v['hiden']?\lib\Def\Opt::$setting.'/':'cabinet/').$v['link'].'">'.$v['title'].'</a></li>';
                }else{if(!$v['hiden'])$burger.='<li><a href="/cabinet/'.$v['link'].'">'.$v['title'].'</a></li>';}
            }
        }
    }
    $burger.='</ul></li>';
}else $burger.='<li id="login_btn"><a  onclick="modalloadForm(null,formLogin);return false;">Вход</a></li>';
            $burger.='</ul>
        </nav>
    </div><div class="cl"></div>
</div><script type="application/javascript">
 
var formLogin=document.createElement("form");
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
formLogin.appendChild(mailLogin);

function userLogin(){
  
document.getElementById("formLoginUser").addEventListener("click", function(event){event.preventDefault();});

if(document.getElementById("btnUserEmail").value==""){document.getElementById("btnUserEmail").focus();
}else if(document.getElementById("btnUserPass").value==""){document.getElementById("btnUserPass").focus();
}else{
  document.getElementById("btnUserLogin").disabled=true;
  
  ajaxPostSend("login=1&mail="+document.getElementById("btnUserEmail").value+"&pass="+document.getElementById("btnUserPass").value,callbackUserLogin,true,true,"/ajax/site/aj_login.php");
  document.getElementById("btnUserLogin").disabled=false;
}
}
function callbackUserLogin(arr){
  //alert(arr.answer);
  
  if(arr.answer==1){
      modalloadclose();
      document.getElementById("login_btn").remove();
      
  }else modalloadFormAnswer("<p>"+arr.answer+"</p>");
  
}
</script>';