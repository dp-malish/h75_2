






function burgerClickOpen(){
    document.getElementById('burger').style.position="fixed";
    //document.getElementById('burger').style.float="null";
    document.getElementById('burger_menu').style.display="block";

    document.getElementById('burger').style.left=0;
    document.getElementById('burger').style.top=0;
    document.getElementById('burger').style.zIndex=13;

    document.getElementById('burger_menu').style.height=window.innerHeight+"px";
    document.getElementById('burger_menu').style.width="240px";
}

function burgerClickClose(){
    document.getElementById('burger').style.position="relative";
    document.getElementById('burger_menu').style.height=0;
    document.getElementById('burger_menu').style.width=0;
    document.getElementById('burger_menu').style.display="none";
}

document.getElementById("burger").addEventListener('click', function() {
    if(document.getElementById('burger_menu').clientHeight<1){

        burgerClickOpen()

    }else{
        burgerClickClose();//burger(468);
    }
});