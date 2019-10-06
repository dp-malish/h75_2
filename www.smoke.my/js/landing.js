


window.addEventListener("load",function(){

    document.getElementById("land_form_call_back").addEventListener("click",function(event){event.preventDefault();});

    document.getElementById("formCallBackSubmitLand").addEventListener("click",function(){formCalBackLand();},false);
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