/*
При прокрутике фиксировать верхние контакты
 */
function topContactScroll(){
    if(window.pageYOffset>0&&window.pageYOffset<510&&document.body.clientWidth>400){
        document.getElementById('bh').style.position="fixed";
        document.getElementById('bh').style.width="100%";
        document.getElementById('bh').style.margin="auto";
        document.getElementById('bh').style.left=0;
        document.getElementById('bh').style.right=0;
        document.getElementById('bh').style.zIndex=3;

        document.getElementById('headerback').style.height="90px";

        document.getElementById('header').style.position="fixed";
        document.getElementById('header').style.width="100%";
        document.getElementById('header').style.margin="auto";
        document.getElementById('header').style.top="50px";
        document.getElementById('header').style.left=0;
        document.getElementById('header').style.right=0;
        document.getElementById('header').style.zIndex=3;


    }else{
        document.getElementById('bh').style.position="relative";
        document.getElementById('header').style.position="relative";
        document.getElementById('header').style.top="0";
        document.getElementById('headerback').style.height="0px";
    }
}


window.onresize=function(){
    document.getElementById('bh').style.position="relative";
    document.getElementById('header').style.position="relative";

};
window.onscroll=function(){
            topContactScroll();
            //Add function scroll
    //при скролле показывать и прятать блок
    if(window.pageYOffset>0&&document.body.clientWidth>800){
        //document.getElementById('up').style.display='block';//alert('j+');
        document.getElementById('up').style.opacity='1';

    }else{
        //document.getElementById('up').style.display='none';//alert('jf');
        document.getElementById('up').style.opacity='0';
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

