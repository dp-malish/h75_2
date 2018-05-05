<?php
/**
 * User авторизация
 */
namespace incl\vt\Authentication;
use lib\Def as Def;

class Authentication{

  private const COOKIE_SALT='ruT5Pjv6TOXdc4zMGVXdp7GmINV';
  private $err=0;

  static $username='';
  static $userid='';

  function __construct(){//Проверить куки юзвера два варианта

    if(isset($_COOKIE['bb_userid']) && isset($_COOKIE['bb_password'])){
      $this->ValidCoolieVariant1();
    }elseif(isset($_COOKIE['bb_sessionhash'])){
      $this->ValidCoolieVariant2();
    }

    if(Def\Opt::$live_user==1 && isset($_GET['do'])){
      //Выход
    }elseif(isset($_POST['login']) && isset($_POST['pass'])){
      //Вход из формы
    }
  }
  //******************
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
      $sql = 'SELECT session.sessionhash AS sessionhash, user.username AS username, user.userid AS userid, user.salt AS salt
		FROM session AS session JOIN user AS user ON(session.userid = user.userid) 
		WHERE session.loggedin <> 0
		AND session.host = \'' . mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . '\' 
		AND session.sessionhash = \'' . mysql_real_escape_string($_COOKIE['bb_sessionhash']) . '\'';
      $result = $MySQLsel->QuerySelect($sql);
      $res = mysql_fetch_array($result);
      //допилить
      if($ses_hash == $res['sessionhash']){Def\Opt::$live_user=1; $username=$res['username']; $userid=$res['userid'];}
    }

  }

}