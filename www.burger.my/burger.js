function burgerClickClose(){
    document.getElementById('burger_ln_1').style.top="9px";
    document.getElementById('burger_ln_3').style.top="27px";
    document.getElementById('burger_ln_c').style.display="block";
    document.getElementById('burger_ln_1').classList.remove('burger_active_L1');
    document.getElementById('burger_ln_3').classList.remove('burger_active_L3');

    document.getElementById('burger_mob').style.position="absolute";
    document.getElementById('burger_mob').style.top="5px";
    document.getElementById('burger_mob').style.right="0";
    document.getElementById('burger_mob').style.height="40px";
    document.getElementById('burger_mob').style.width="40px";




    burgerClickClose.position=true;

}
function burgerClickOpen(){
    document.getElementById('burger_ln_1').style.top="18px";
    document.getElementById('burger_ln_3').style.top="18px";
    document.getElementById('burger_ln_c').style.display="none";
    document.getElementById('burger_ln_1').classList.add('burger_active_L1');
    document.getElementById('burger_ln_3').classList.add('burger_active_L3');

    document.getElementById('burger_mob').style.position="fixed";
    document.getElementById('burger_mob').style.top="0";
    //document.getElementById('burger_mob').style.left="0";
    document.getElementById('burger_mob').style.right="0";
    document.getElementById('burger_mob').style.height="100%";
    document.getElementById('burger_mob').style.width="100%";
    document.getElementById('burger_mob').style.zIndex="120";


    burgerClickClose.position=false;
}
burgerClickClose.position=true;

window.addEventListener("load", function(){
 try{
     document.getElementById("burger").addEventListener('click', function(){
         if(burgerClickClose.position==true){burgerClickOpen();
         }else{burgerClickClose();}
     });
 }catch(e){}
},true);