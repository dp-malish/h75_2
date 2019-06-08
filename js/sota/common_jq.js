/*$(document).ready(function(){
    //$("img").lazyload({effect:"fadeIn"});
    $("a.colorbox").colorbox({
        maxWidth: "92%",
        maxHeight: "92%",
        opacity: "0.72",
        current: "{current} из {total}",
        photo: true
    });
});*/

$(function() {
    $(".colorbox").on("click", function(event) {
        event.preventDefault();


        document.getElementById("m_main_img").setAttribute("src",$(this).attr("src"));

        $("[data-some-colorbox]").colorbox({
            onClosed: $.colorbox.remove,

            maxWidth: "92%",
            maxHeight: "92%",
            opacity: "0.72",
            current: "{current} из {total}",
            rel: true,
            open: true,
            photo: true,
            href: function() {
                return $(this).attr("data-some-colorbox");
            },
            next:function () {
                document.getElementById("m_main_img").setAttribute("src",$(this).attr("src"));
                document.getElementById("m_main_img").setAttribute("data-some-colorbox",$(this).attr("src"));
            }
        })
    });



    $(".colorbox_m").on("click", function(event) {
        event.preventDefault();

        $("[data-some-colorbox]").colorbox({
            onClosed: $.colorbox.remove,
            maxWidth: "92%",
            maxHeight: "92%",
            opacity: "0.72",
            current: "{current} из {total}",
            rel: true,
            open: true,
            photo: true,
            href: function() {
                //return document.getElementById("m_main_img").getAttribute("src");
                return $(this).attr("data-some-colorbox")
            }
        })
    })


});

