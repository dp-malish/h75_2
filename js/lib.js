//Перенос строки при печати
function nl2br(str){return str.replace(/(\r\n|\n\r|\r|\n)/g,"<br>")}

//Работа с куками на сайте
function setCookie(name,value){document.cookie=name+"="+value+"; path=/;";}
function getCookie(name){var r=document.cookie.match("(^|;) ?"+name+"=([^;]*)(;|$)");if(r)return r[2];else return"";}