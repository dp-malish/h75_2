/*
При прокрутике фиксировать верхние контакты
 */
function topContactScroll(){
    if(window.pageYOffset>0&&window.pageYOffset<910&&document.body.clientWidth>800){
        document.getElementById('headcontact').style.position="fixed";
        document.getElementById('headcontact').style.width="100%";
        document.getElementById('headcontact').style.margin="auto";
        document.getElementById('headcontact').style.left=0;
        document.getElementById('headcontact').style.right=0;
    }else{
        document.getElementById('headcontact').style.position="relative";
    }
}


window.onresize=function () {
    document.getElementById('headcontact').style.position="relative";
};
window.onscroll=function(){
            topContactScroll();
            //Add function scroll
    //при скролле показывать и прятать блок
    if(window.pageYOffset>0&&document.body.clientWidth>800){
        //document.getElementById('up').style.display='block';//alert('j+');
    }else{
        //document.getElementById('up').style.display='none';//alert('jf');
    }
};


function scrollUpStart(i){
    if(i<10)window.scrollTo(0,0);
    else window.scrollTo(0,i)
}

window.addEventListener("load", function(){
    try{
        document.getElementById('up').onclick=function(){
            var i,y=33;
            for(i=window.pageYOffset;i>0;i-=4){setTimeout('scrollUpStart('+i+')',y++);}
        }
    }catch(e){}
},true);

