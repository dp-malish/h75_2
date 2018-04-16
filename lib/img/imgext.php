<?php
namespace lib\Img;
/*
 *
 *
 * */
use lib\Def as Def;

class ImgExt{

    public $img=1;
    public $imgExt=[];
    protected $badf=[".php",".phtml",".php3",".php4",".html",".txt",".lnk"];



    static function getImgDir($post){
        $dir=Validator::html_cod($post);
        $count=count(SqlTable::IMG);
        if(!Validator::paternInt($dir)){return false;
        }elseif($count>=0 && $count<$dir){return false;
        }else{return SqlTable::IMG[$dir][2];}
    }
    static function getImgSection($post){
        $post=Validator::html_cod($post);
        $count=count(SqlTable::IMG);
        if(!Validator::paternInt($post)){return false;
        }elseif($count>=0 && $count<$post){return false;
        }else{return SqlTable::IMG[$post][1];}
    }
    static function getMaxIdDir($post){
        $post=Validator::html_cod($post);
        $table=self::getImgTableName($post);
        if($table){
            $dir=self::getImgDir($post);
            $DB=new SQLi(true);
            $maxId=$DB->intSQL('SELECT id FROM '.$table.' ORDER BY id DESC LIMIT 1');
            if($maxId)return[$dir,$maxId];else{Validator::$ErrorForm[]='Неизвестная ошибка!';return false;}
        }else{Validator::$ErrorForm[]='Ошибочка!';return false;}
    }
    static function getMaxIdDirExt($post){$res=false;
        $post=Validator::html_cod($post);
        $count=count(SqlTable::IMG);
        for($i=0;$i<$count;$i++){if(SqlTable::IMG[$i][2]==$post)$res=SqlTable::IMG[$i][0];}
        if($res){$DB=new SQLi(true);
            $res=$DB->intSQL('SELECT id FROM '.$res.' ORDER BY id DESC LIMIT 1');
            if($res)return $res;else{Validator::$ErrorForm[]='Неизвестная ошибка!';return false;}
        }else return false;
    }
    function insImg($postTable,$postImg,$upd=0){
        try{
            $err=false;
            if(PostRequest::issetPostKey([$postTable]) && !empty($_FILES)){
                $table=self::getImgTableName($_POST[$postTable]);
                if($table){
                    if($this->auditBlackListImg($postImg)){
                        $extFile=$this->getImgExt($postImg);
                        if($extFile===false){$err=true;
                        }else{
                            $upd=Validator::html_cod($upd);
                            if(Validator::paternInt($upd)){
                                $content=file_get_contents($_FILES[$postImg]['tmp_name']);
                                unlink($_FILES[$postImg]['tmp_name']);
                                $DB=new SQLi(true);
                                $file_name=$DB->realEscapeStr(Validator::html_cod($_FILES[$postImg]['name']));
                                $content=$DB->realEscapeStr($content);
                                if($upd==0){
                                    if($DB->boolSQL('INSERT INTO '.$table.' VALUES(NULL,'.$file_name.','.$extFile.','.$content.');')){
                                        $this->img=$DB->lastId();
                                    }else{$err=true;}
                                }elseif($upd>0){
                                    $upd=$DB->realEscapeStr($upd);
                                    if($DB->boolSQL('UPDATE '.$table.' SET name_file='.$file_name.',png='.$extFile.',content='.$content.' WHERE id='.$upd.';')){
                                        $this->img=$upd;
                                    }else{$err=true;}
                                }
                            }else{$err=true;}
                        }
                    }else{$err=true;}
                }else{$err=true;}
            }else{$err=true;}
            return($err)?false:true;
        }catch(Exception $e){return false;}
    }
    function insImgExt($postTable,$postImg){
        try{
            $err=false;
            if(PostRequest::issetPostKey([$postTable]) && !empty($_FILES)){
                $table=self::getImgTableName($_POST[$postTable]);
                if($table){
                    $count=count($_FILES[$postImg]['name']);
                    for($i=0;$i<$count;$i++){
                        if($this->auditBlackListImg($postImg,$i)){
                            $extFile=$this->getImgExt($postImg,$i);
                            if($extFile!==false){
                                $content=file_get_contents($_FILES[$postImg]['tmp_name'][$i]);
                                unlink($_FILES[$postImg]['tmp_name'][$i]);
                                $DB=new SQLi(true);
                                $file_name=$DB->realEscapeStr(Validator::html_cod($_FILES[$postImg]['name'][$i]));
                                $content=$DB->realEscapeStr($content);
                                if($DB->boolSQL('INSERT INTO '.$table.' VALUES(NULL,'.$file_name.','.$extFile.','.$content.');')){
                                    $this->imgExt[]=$DB->lastId();
                                }else{Validator::$ErrorForm[]='Ошибка базы данных';}
                            }
                        }
                    }
                    //return $count;
                }else{$err=true;}
            }else{$err=true;}
            return($err)?false:true;
        }catch(Exception $e){return false;}
    }
    static function getImgTableName($post){
        $table=Validator::html_cod($post);
        $count=count(SqlTable::IMG);
        if(!Def\Validator::paternInt($table)){Validator::$ErrorForm[]='не таблица...';return false;
        }elseif($count>=0 && $count<$table){Validator::$ErrorForm[]='не таблица';return false;
        }else{return SqlTable::IMG[$table][0];}
    }
    private function auditBlackListImg($postName,$arr=false){$err=false;
        foreach($this->badf as $v){
            if($arr===false){
                if(preg_match("/$v\$/i",$_FILES[$postName]['name'])){Validator::$ErrorForm[]='Вы пытаетесь загрузить недопустимый файл.';$err=true;}
            }else
                if(preg_match("/$v\$/i",$_FILES[$postName]['name'][$arr])){Validator::$ErrorForm[]='Вы пытаетесь загрузить недопустимый файл - '.$_FILES[$postName]['name'][$arr];$err=true;
                }
        }return($err)?false:true;
    }
    private function getImgExt($postName,$arr=false){$err=false;
        if($arr===false){
            if(substr($_FILES[$postName]['type'],0,5)=='image'){
                $imgInfo=getimagesize($_FILES[$postName]['tmp_name']);
            }else{Validator::$ErrorForm[]='Не доустимый формат изображения';$err=true;}
        }else{
            if(substr($_FILES[$postName]['type'][$arr],0,5)=='image'){
                $imgInfo=getimagesize($_FILES[$postName]['tmp_name'][$arr]);
            }else{Validator::$ErrorForm[]='Не доустимый формат изображения - '.$_FILES[$postName]['name'][$arr];$err=true;}
        }
        if($err)return false;
        else{
            if($imgInfo['mime']=='image/png')return 1;
            elseif($imgInfo['mime']=='image/jpeg')return'NULL';
            else{Def\Validator::$ErrorForm[]='Не доустимое расширение изображения - '.($arr!==false?$_FILES[$postName]['name'][$arr]:'');return false;}
        }
    }

}