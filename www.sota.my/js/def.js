
window.onscroll=function(){
    if(window.pageYOffset>0&&window.pageYOffset<310&&document.body.clientWidth>800){
        document.getElementById('headcontact').style.position="fixed";
        document.getElementById('headcontact').style.width="100%";
        document.getElementById('headcontact').style.margin="auto";
        document.getElementById('headcontact').style.left=0;
        document.getElementById('headcontact').style.right=0;
    }else{
        document.getElementById('headcontact').style.position="relative";
    }
    //**** burger
    burger(468);
};
function burger(posY) {
    //**** burger
    burgerClickClose();

    if(window.pageYOffset>=posY/*&&document.body.clientWidth>800*/){
        //alert(window.pageYOffset);
        document.getElementById('burger').style.position="fixed";
        document.getElementById('burger').style.float="null";
        document.getElementById('burger').style.left=0;
        document.getElementById('burger').style.top=0;
        document.getElementById('burger').style.zIndex=13;

        
    }else{

        document.getElementById('burger').style.position="relative";
        //document.getElementById('burger').style.float="left";
        //burgerClickClose()
    }
}

//function burgerClick(){}


function burgerClickOpen(){
    document.getElementById('burger').style.position="fixed";
    document.getElementById('burger').style.float="null";
    document.getElementById('burger').style.left=0;
    document.getElementById('burger').style.top=0;
    document.getElementById('burger').style.zIndex=13;

    document.getElementById('burger_menu').style.height=window.innerHeight+"px";
    document.getElementById('burger_menu').style.width="220px";
}

function burgerClickClose(){
    document.getElementById('burger_menu').style.height=0;
    document.getElementById('burger_menu').style.width=0;

}

document.getElementById("burger").addEventListener('click', function() {
    if(document.getElementById('burger_menu').clientHeight<1){

        burgerClickOpen()

    }else{
        burgerClickClose();burger(468);
    }
});