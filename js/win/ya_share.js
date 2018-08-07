window.addEventListener("load", function(){
    try{
        if(document.cookie.length>4){
            var js=document.createElement("script");
            js.type='text/javascript';
            js.src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js";
            document.getElementsByTagName("head")[0].appendChild(js,document.head.lastChild);
            js=document.createElement("script");
            js.type='text/javascript';
            js.src="//yastatic.net/share2/share.js";
            document.getElementsByTagName("head")[0].appendChild(js,document.head.lastChild);
        }
    }catch(e){}
},true);