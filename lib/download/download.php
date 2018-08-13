<?php
namespace lib\Download;
use lib\Def as Def;
class Download{
//в php.ini увелич post_max_size и upload_max_filesize
//в my.cnf wait_timeout и max_allowed_packet
    protected $send_form_btn_name='send';//html form
    protected $def_post_name='upfile';//html form

    public $last_id=1;


static function getFileDB(){
    if(isset($_GET['id'])){

        try{
            $Link=@mysql_connect($Host,$Admin,$Password);
            @mysql_select_db($DBName,$Link);
            @mysql_query("SET NAMES utf8");
            $sql='SELECT name_file,size_file,content FROM '.$DBTable.$kind_s_ext.' WHERE id =\''.$id.'\'';
            $sound=@mysql_query($sql);
            $res=@mysql_fetch_array($sound);
            if($res['content']=='')exit();
            @mysql_free_result($sound);
            @mysql_close($Link);
        }catch(Exception $e){}
        if(!$load_f){
            if($kind_sound==1){header('Content-Type: audio/mpeg');}
            if($kind_sound==2){header('Content-Type: audio/ogg');}
            header('Cache-Control: public, max-age=29030400');
            header('Content-Length: '.$res['size_file']);
        }else{
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.$res['name_file']);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.$res['size_file']);
        }
        echo $res['content'];
    }

}

function saveFileDB($DBTable,$last_id=false){
    if($this->validFile()){
        //Если копирование файла во временную дирекорию прошло успешно, то
        if(is_uploaded_file($_FILES[$this->def_post_name]["tmp_name"])){
            $size=$_FILES[$this->def_post_name]["size"];
            $content_type=$_FILES[$this->def_post_name]["type"];
            $DB=new Def\SQLi();
            $file_name=$DB->realEscapeStr($_FILES[$this->def_post_name]['name']);
            $content_type=$DB->realEscapeStr($content_type);
            //Читаем содержимое файла
            $content=file_get_contents($_FILES[$this->def_post_name]['tmp_name']);
            // Уничтожаем файл во временной директории
            unlink($_FILES[$this->def_post_name]['tmp_name']);
            // Экранируем спец-символы в бинарном содержимом файла
            $content =$DB->realEscapeStr($content);
                $sql='INSERT INTO '.$DBTable.' VALUES(NULL,'.$file_name.','.$content_type.','.$size.','.$content.');';
                if($DB->boolSQL($sql)){
                    if($last_id)$this->last_id=$DB->lastId();
                }else Def\Validator::$ErrorForm[]='Ошибка базы данных';
        }else{Def\Validator::$ErrorForm[]='Ошибка загрузки файла на сервер';}
    }
    return empty(Def\Validator::$ErrorForm);
}

protected function validFile(){
    if(isset($_POST[$this->send_form_btn_name])){//Если размер файла не превышает допустимый, то ...
        if($_FILES[$this->def_post_name]["size"]>1024*1024*35){Def\Validator::$ErrorForm[]='Размер файла превышает допустимый.';}
    }else Def\Validator::$ErrorForm[]='Ошибка формы 0х000016';
    return empty(Def\Validator::$ErrorForm);
}


}