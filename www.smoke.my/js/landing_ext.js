window.addEventListener("load",function(){


    const btnBuy= document.querySelectorAll('.land_btn_buy');

    for(var i=0;i<btnBuy.length;i++){
        btnBuy[i].addEventListener('click', function() {
            //alert(this.innerHTML);
            landBtnBuy(this);
        });
    }

    document.getElementById("basket_land").addEventListener("click",function(){landBasketFormCreate();},false);

    /*document.getElementById("land_form_call_back").addEventListener("click",function(event){event.preventDefault();});
    */
},true);


function landBtnBuy(x){//формирование иконки корзины

    document.getElementById("basket_calc_land").innerText=x.dataset.price+" грн.";
    document.getElementById("basket_calc_count_land").innerText=0;
    document.getElementById("basket_land").style.opacity=0.9;

        if(landBtnBuy.basket[x.dataset.id]==undefined){
            //Заводим новый id
            landBtnBuy.basket[x.dataset.id]={kol_vo:1,price:x.dataset.price};
            //Прибавляем id к общему числу товаров и сумме
            landBtnBuy.total_count+=Number(landBtnBuy.basket[x.dataset.id].kol_vo);
            landBtnBuy.total_price+=Number(landBtnBuy.basket[x.dataset.id].price);
            //Заполняем внешний вид корзинки на сайте
            document.getElementById("basket_calc_count_land").innerText=landBtnBuy.total_count;
            document.getElementById("basket_calc_land").innerText=landBtnBuy.total_price+" грн.";

            document.getElementById("basket_calc_land").style.opacity=.8;
            setTimeout("document.getElementById('basket_calc_land').style.opacity=0",1500);
        }else{
            //Изменим количество штук в id
            landBtnBuy.basket[x.dataset.id].kol_vo+=1;
            alert(landBtnBuy.basket[x.dataset.id].kol_vo);
            //Прибавляем id к общему числу товаров и сумме
            landBtnBuy.total_count+=1;
            landBtnBuy.total_price+=Number(landBtnBuy.basket[x.dataset.id].price);
            //Заполняем внешний вид корзинки на сайте
            document.getElementById("basket_calc_count_land").innerText=landBtnBuy.total_count;
            document.getElementById("basket_calc_land").innerText=landBtnBuy.total_price+" грн.";

            document.getElementById("basket_calc_land").style.opacity=.8;
            setTimeout("document.getElementById('basket_calc_land').style.opacity=0",1500);
        }
    //alert(landBtnBuy.basket.id);
}
landBtnBuy.basket={};
landBtnBuy.total_count=0;
landBtnBuy.total_price=0;


function landBasketFormCreate(){

    try{
        var form=document.createElement("form");
        form.id="formBasketLand";
        form.innerHTML="<h4>Ваш заказ</h4>";
        form.addEventListener("click", function(event){event.preventDefault();});

        var d=document.createElement("div");
        d.setAttribute("class","form-input form-icon-men");
        form.appendChild(d);
        var Login=document.createElement("input");
        Login.id="formCallBackName";
        Login.name="username";
        Login.type="text";
        Login.size="13";
        Login.title="Введите Ваше имя";
        Login.placeholder="Ваше имя";
        Login.setAttribute("required","");
        d.appendChild(Login);

        d=document.createElement("div");
        d.setAttribute("class","form-input form-icon-tel");
        form.appendChild(d);
        var tel=document.createElement("input");
        tel.id="formCallBackTel";
        tel.name="tel";
        tel.type="text";
        tel.size="13";
        tel.title="Введите номер телефона";
        tel.placeholder="Номер телефона";
        tel.setAttribute("required","");
        d.appendChild(tel);

        var submitBtn=document.createElement("input");
        submitBtn.id="formCallBackSubmit";
        submitBtn.name="submit";
        submitBtn.setAttribute("class","form-submit");
        submitBtn.type="submit";
        submitBtn.value="Перезвоните мне";
        submitBtn.addEventListener("click",formCallBackSubmit);
        form.appendChild(submitBtn);

        modalloadForm(null,form);
    }catch(e){}


}
