/*
При прокрутике фиксировать верхние контакты
 */
function topContactScroll(){
    if(window.pageYOffset>0&&window.pageYOffset<310&&document.body.clientWidth>800){
        document.getElementById('headcontact').style.position="fixed";
        document.getElementById('headcontact').style.width="100%";
        document.getElementById('headcontact').style.margin="auto";
        document.getElementById('headcontact').style.left=0;
        document.getElementById('headcontact').style.right=0;
    }else{
        document.getElementById('headcontact').style.position="relative";
    }
}



window.onscroll=function(){
            topContactScroll();
            //Add function scroll



};






