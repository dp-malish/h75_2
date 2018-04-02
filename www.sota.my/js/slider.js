window.requestAnimationFrame=(function(){// для поддержки requestAnimationFrame всеми браузерами
    return window.requestAnimationFrame||function(callback){return window.setTimeout(callback,1000/60)}
})();
// функция слайдера
function slider(f,img,button,V,Vo){
    var iii=0,
        start=null,
        clear=0;
    function step(time){
        if (start===null)start=time;
        var progress=time-start;
        if (progress>V){
            start=null;
            for(var i=0;i<img.length;i++){
                img[i].style.zIndex="0";
                button[i].style.opacity="1";
            }
            img[iii].style.zIndex="1";
            iii=((iii!=(img.length-1))?(iii+1):0);
            img[iii].style.zIndex="2";
            img[iii].style.opacity="0";
            button[iii].style.opacity=".4";
        }else if(img[iii].style.opacity!=""){
            img[iii].style.opacity=((progress/Vo<1)?(progress/Vo):1);
        }
        if(clear!="0"&&progress>Vo){}else{requestAnimationFrame(step);}
    }
    requestAnimationFrame(step);
    f.onmouseenter=function(){if(clear=="0")clear="1";}//при наведении на слайдер
    f.onmouseleave=function(){if(clear=="1"){clear="0";requestAnimationFrame(step);}}//курсор убран со слайдера
    for(var j=0;j<button.length;j++){//при нажатии кнопок
        button[j].onclick=function(){
            clear="2";
            for(var i=0;i<img.length;i++){
                img[i].style.zIndex="0";
            }
            img[this.value].style.zIndex="2";
            img[this.value].style.opacity="1";
            for(var k=0;k<button.length;k++){button[k].style.opacity=((button[k]==this)?'.4':'1')}
        }
    }
}

// вызов функции слайдера
window.addEventListener("load", function(){
    try{
        var f=document.getElementById("main_slider"),
            img=f.getElementsByTagName("img"),
            button=btnSlider.getElementsByTagName("button");
        slider(f,img,button,"7000","1000");  // '5000' — скорость смены картинок, '1000' — скорость прозрачности
    }catch(e){}
}, true);