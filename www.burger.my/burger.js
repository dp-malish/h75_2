function burgerClickOpen(){
    document.getElementById('burger_ln_1').style.top="9px";
    document.getElementById('burger_ln_3').style.top="27px";
    document.getElementById('burger_ln_c').style.display="block";
    document.getElementById('burger_ln_1').classList.remove('burger_active_L1');
    document.getElementById('burger_ln_3').classList.remove('burger_active_L3');
    burgerClickClose.position=false;

}
function burgerClickClose(){
    document.getElementById('burger_ln_1').style.top="18px";
    document.getElementById('burger_ln_3').style.top="18px";
    document.getElementById('burger_ln_c').style.display="none";
    document.getElementById('burger_ln_1').classList.add('burger_active_L1');
    document.getElementById('burger_ln_3').classList.add('burger_active_L3');
    burgerClickClose.position=true;

}
burgerClickClose.position=false;

window.addEventListener("load", function(){
 try{
     document.getElementById("burger").addEventListener('click', function(){
         if(burgerClickClose.position==true){burgerClickOpen();
         }else{burgerClickClose();}
     });
 }catch(e){}
},true);