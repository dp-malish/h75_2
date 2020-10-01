//basket lite

//Элементы управления должны иметь одного родителя
//id элемента начинается с pos+цыфры


function addToBasketLite(el){

}

function plusBasket(el) {
    var id = el.parentNode.dataset.id;
    var takeId = "pos" + id;

    if( Basket[id] === undefined){
        Basket[id] = {price:el.parentNode.dataset.price};
        Basket[id].kol_vo=1;
    }else{
        var kol_vo=Basket[id].kol_vo;
        kol_vo++;
        Basket[id].kol_vo=kol_vo;
    }
    //Temp str
    document.getElementById(takeId).innerText ="Id " +id + " Цена " + Basket[id].price + "  lo-vo  " + Basket[id].kol_vo;

    var JSON_basket = JSON.stringify(Basket); //сериализуем его

    localStorage.setItem("basket",JSON_basket);

    var returnObj = JSON.parse(localStorage.getItem("basket")); //спарсим его обратно объект

    //alert(returnObj[1].kol_vo);
}