window.addEventListener("load",function(){

    document.getElementById("land_form_call_back").addEventListener("click",function(event){event.preventDefault();});

    document.getElementById("formCallBackSubmitLand").addEventListener("click",function(){formCalBackLand();},false);

    document.getElementById("land_form_fast_buy").addEventListener("click",function(event){event.preventDefault();});

    document.getElementById("formFastBuySubmitLand").addEventListener("click",function(){formFastBuyLand();},false);
},true);

function formCalBackLand(){

    if(document.getElementById("formCallBackNameLand").value==""){document.getElementById("formCallBackNameLand").focus();
    }else if(document.getElementById("formCallBackTelLand").value==""){document.getElementById("formCallBackTelLand").focus();
    }else{
        document.getElementById("formCallBackSubmitLand").disabled=true;
        ajaxPostSend("call_me=1&name="+document.getElementById("formCallBackNameLand").value+
            "&tel="+document.getElementById("formCallBackTelLand").value,formCallBackSubmitAnswerLand,true,true,"/ajax/call_back/call.php");
    }
}

function formCallBackSubmitAnswerLand(arr){
    modalloadForm("<p>"+arr.answer+"</p>");
    document.getElementById("formCallBackNameLand").value="";
    document.getElementById("formCallBackTelLand").value="";
    //document.getElementById("formCallBackSubmitLand").disabled=false;
}

/***************************************************************/

function formFastBuyLand(){

    if(document.getElementById("formFastFIOLand").value==""){
        document.getElementById("formFastFIOLand").focus();
    }else if(document.getElementById("formFastTelLand").value==""){
        document.getElementById("formFastTelLand").focus();
    }else if(document.getElementById("formFastTownLand").value==""){
        document.getElementById("formFastTownLand").focus();
    }else if(document.getElementById("formFastNPostLand").value==""){
        document.getElementById("formFastNPostLand").focus();
    }else if(document.getElementById("formFastColorLand").value==""){
        document.getElementById("formFastColorLand").focus();
    }else{
        document.getElementById("formFastBuySubmitLand").disabled=true;
        ajaxPostSend("fast_order=1&name="+document.getElementById("formFastFIOLand").value+
            "&tel="+document.getElementById("formFastTelLand").value+
            "&town="+document.getElementById("formFastTownLand").value+
            "&npost="+document.getElementById("formFastNPostLand").value+
            "&color="+document.getElementById("formFastColorLand").value
            ,formCallBackSubmitAnswerLand,true,true,"/ajax/order/fast_order.php");
    }

}
