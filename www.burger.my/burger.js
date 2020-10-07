
function burgerClickOpen(){
/*    document.getElementById('burger').style.position="fixed";
    document.getElementById('burger_menu').style.display="blocks";

    document.getElementById('burger').style.left=0;
    document.getElementById('burger').style.top=0;
    document.getElementById('burger').style.zIndex=13;

    document.getElementById('burger_menu').style.height=window.innerHeight+"px";
    document.getElementById('burger_menu').style.width="240px";
    document.getElementById('burger_menu').style.display="block";*/

    alert("65");

}

function burgerClickClose(){
    /*document.getElementById('burger').style.position="relative";
    document.getElementById('burger_menu').style.height=0;
    document.getElementById('burger_menu').style.width=0;
    document.getElementById('burger_menu').style.display="none";*/
    var papa=document.getElementById('burger');

    document.getElementById('burger_ln_c').style.display="none";
    //var el=document.getElementById('burger').childNodes[2];

    //el.style.display="none";

    alert('e');

}



window.addEventListener("load", function(){
    try{
        document.getElementById("burger").addEventListener('click', function() {
            if(document.getElementById('burgermenu').clientHeight<1){
                burgerClickOpen();
            }else{
                burgerClickClose();
            }
        });
    }catch(e){}
},true);