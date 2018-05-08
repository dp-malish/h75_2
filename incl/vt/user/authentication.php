<?php
/**
 * User авторизация
 */
namespace incl\vt\User;
use lib\Def as Def;

class Authentication{

  private const COOKIE_SALT='ruT5Pjv6TOXdc4zMGVXdp7GmINV';
  private $err=0;
  static $bad_login_form='';

  static $username='';
  static $userid='';

  static $user_link_cabinet='';


  function __construct(){//Проверить куки юзвера два варианта
    if(isset($_COOKIE['bb_userid']) && isset($_COOKIE['bb_password'])){$this->ValidCoolieVariant1();
    }elseif(isset($_COOKIE['bb_sessionhash'])){$this->ValidCoolieVariant2();}

    if(Def\Opt::$live_user==1 && isset($_GET['do'])){//Выход
      $this->ExitSite();
    }elseif(isset($_POST['login']) && isset($_POST['pass'])){//Вход из формы
      $this->LoginSite();}
    $this->UserLinkCabinet();
  }
  //******************//******************//******************
  //******************//******************//******************
  private function ValidCoolieVariant1(){
    $login=htmlspecialchars($_COOKIE['bb_userid'], ENT_QUOTES);
    if(preg_match("/[^0-9]+/",$login)){$this->err=1;}
    $pass=htmlspecialchars($_COOKIE['bb_password'], ENT_QUOTES);
    if(preg_match("/[^A-z0-9]+/",$pass)){$this->err=1;}
    if($this->err==0){
      $DB=new Def\SQLi();
      $res=$DB->strSQL('SELECT userid,usergroupid,membergroupids,infractiongroupids,username, password,salt FROM user WHERE userid='.$DB->realEscapeStr($login));
      $hash_res=md5($res['password'].self::COOKIE_SALT);
      if($hash_res == $pass){Def\Opt::$live_user=1; self::$username=$res['username']; self::$userid=$res['userid'];}
    }
  }
  //******************
  private function ValidCoolieVariant2(){
    $ses_hash=htmlspecialchars($_COOKIE['bb_sessionhash'], ENT_QUOTES);
    if(preg_match("/[^A-z0-9]+/",$ses_hash)){$this->err=1;}
    else{
      $DB=new Def\SQLi();
      $res=$DB->strSQL('SELECT session.sessionhash AS sessionhash, user.username AS username, user.userid AS userid, user.salt AS salt
		FROM session AS session JOIN user AS user ON(session.userid=user.userid) 
		WHERE session.loggedin <> 0
		AND session.host='.$DB->realEscapeStr(Def\Validator::getIp()).' 
		AND session.sessionhash='.$DB->realEscapeStr($ses_hash));
      //допилить
      if($ses_hash==$res['sessionhash']){Def\Opt::$live_user=1; self::$username=$res['username']; self::$userid=$res['userid'];}
    }
  }
  //******************//******************//******************
  //******************//******************//******************
  private function ExitSite(){
    if(isset($_GET['do'])){
      $exit=Def\Validator::html_cod($_GET['do']);
      if($exit=='logout'){//выйти надо
        $end_time_cookie = mktime(0,0,0,1,1,2017);
        setcookie("bb_userid","",$end_time_cookie, '/', '.'.Def\Opt::$site);
        setcookie("bb_password","",$end_time_cookie, '/', '.'.Def\Opt::$site);
        setcookie("bb_sessionhash","",$end_time_cookie, '/', '.'.Def\Opt::$site);
        Def\Opt::$live_user=0;
      }
    }
  }
  //******************
  private function LoginSite(){

    $login=Def\Validator::html_cod($_POST['login']);
    $pass=Def\Validator::html_cod($_POST['pass']);
    if(preg_match("/[^0-9А-Яа-яЁёa-zA-Z]+/u",$login)){$this->err=1;}
    if(preg_match("/[^0-9А-Яа-яЁёa-zA-Z]+/u",$pass)){$this->err=1;}

    if($this->err!=1){

      $DB=new Def\SQLi();

      $res=$DB->strSQL('SELECT userid, username, password, salt FROM user WHERE username ='.$DB->realEscapeStr($login));
      if($res["userid"]==''){self::$bad_login_form='<p>Неверное имя пользователя или пароль</p>';
      }else{

//***************************допилить
//***************************допилить
//***************************допилить
//***************************допилить
//***************************допилить
//***************************допилить
//***************************допилить
//***************************допилить

        $pass=md5($pass);$pass=md5($pass.$res["salt"]);
        if($res["password"]==$pass){
            //всё гуд
            $live_user=1;
            $username=$res['username'];
            self::$userid=$res['userid'];
            //ОТПРАВИТЬ КУКИ  18144000; 30 дней
            $hash_pass=md5($res['password'].self::COOKIE_SALT);
            setcookie("bb_userid",self::$userid,time()+18144000, '/', '.'.Def\Opt::$site);
            setcookie("bb_password",$hash_pass,time()+18144000, '/', '.'.Def\Opt::$site);
        }else{self::$bad_login_form='<p>Неверное имя пользователя или пароль</p>';}
      }
    }else{self::$bad_login_form='<p>Неверное имя пользователя или пароль</p>';}


  }
  private function UserLinkCabinet(){
    if(Def\Opt::$live_user==1){
      self::$user_link_cabinet='<div id="hello_user"><ul class="fr"><li><a href="http://forum.vt-fishing.com.ua/members/user-'.self::$userid.'/" target="_blank">Добро пожаловать, '.self::$username.'</a></li><li><a href="http://forum.vt-fishing.com.ua/usercp.php">Кабинет</a></li><li><a href="/?do=logout" >Выход</a></li></ul></div>';
    }else{
      self::$user_link_cabinet='<div id="no_user"><ul class="fr"><li><a href="http://forum.vt-fishing.com.ua/faq.php">Помощь</a></li><li><a href="http://forum.vt-fishing.com.ua/register.php">Регистрация</a></li></ul></div>';
    }
  }
}