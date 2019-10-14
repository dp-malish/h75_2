window.addEventListener("load",function(){


    const btnBuy= document.querySelectorAll('.land_btn_buy');

    for(var i=0;i<btnBuy.length;i++){
        btnBuy[i].addEventListener('click', function() {
            //alert(this.innerHTML);
            landBtnBuy(this);
        });
    }



    /*document.getElementById("land_form_call_back").addEventListener("click",function(event){event.preventDefault();});

    document.getElementById("formCallBackSubmitLand").addEventListener("click",function(){formCalBackLand();},false);*/

},true);



function landBtnBuy(x){
    //alert(x.innerHTML);

    document.getElementById("basket_calc_land").innerText=x.dataset.price+" грн.";
    document.getElementById("basket_calc_count_land").innerText=0;
    document.getElementById("basket_land").style.opacity=0.9;

        if(landBtnBuy.basket[x.dataset.id]==undefined){
            landBtnBuy.basket[x.dataset.id]={kol_vo:1,price:x.dataset.price};
            landBtnBuy.total_count+=landBtnBuy.basket[x.dataset.id].kol_vo;
            landBtnBuy.total_price+=Number(landBtnBuy.basket[x.dataset.id].price);
            document.getElementById("basket_calc_count_land").innerText=landBtnBuy.total_count;
            document.getElementById("basket_calc_land").innerText=landBtnBuy.total_price+" грн.";
            /*alert("yes");*/
        }else{
           /* alert("no");
            alert(landBtnBuy.basket[x.dataset.id].kol_vo);*/
            landBtnBuy.basket[x.dataset.id].kol_vo++;
            document.getElementById("basket_calc_count_land").innerText=landBtnBuy.basket[x.dataset.id].kol_vo;
           /* alert(landBtnBuy.basket[x.dataset.id].price);*/

            /*alert(landBtnBuy.basket[x.dataset.id].kol_vo);*/
        }/**/



    //alert(landBtnBuy.basket.id);

}

landBtnBuy.total_count=0;
landBtnBuy.total_price=0;

landBtnBuy.basket={
    /*1:{
        kol_vo:1,
        price:750},
    /*3
        kol_vo:555,
        price:700},*/
};

//alert(landBtnBuy.basket["3"]);