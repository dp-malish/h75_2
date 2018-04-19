function button_back(page_link){//кнопка назад в блогах
  var mylink=window.location.protocol+'//'+window.location.hostname+'/'+page_link;// http://dp-malish.my/детское-здоровье/
  var length_str_start=mylink.length;
  try{
    var temp_ref=referal.substring(0, length_str_start);
    var length_str_end=temp_ref.length;
    if (length_str_start==length_str_end){
      var hesh=document.location.href.search(/\#/i);
      if(hesh!=-1){
        document.location.href=mylink;
      }else{window.history.back();}
    }else{document.location.href=mylink;}
  }catch(e){document.location.href='/';}
}