var iOS = /iPad|iPhone|iPod|CriOS/.test(navigator.userAgent) && !window.MSStream;

function screenSize() {
    if (iOS) {
        var vh = $(window).height();
        var vw = $(window).width();
        var vhoverlay2 = vh * 0.685;
        var vhoverlay3 = vh * 0.6;
        var vhoverlay2_small = vh * 0.685 - 233;
        var vhoverlay3_small = vh * 0.6 - 210;
        var herovh = vh * 0.8;
        var contactvh = vh * 1.1;
        var newsvh = vh * 0.65;

        document.getElementById('masthead').classList.remove("header_standard_size");
//        $("#masthead").css("height", vh);
        $(".front-header").css("height", vh);
        $(".slider_image").css("height", vh);
        if (vw > 600) {
            $(".header_overlay_2 svg").css("height", vhoverlay2);
            $(".header_overlay_3 svg").css("height", vhoverlay3);
        } else {
            $(".header_overlay_2 svg").css("height", vhoverlay2_small);
            $(".header_overlay_3 svg").css("height", vhoverlay3_small);      
        }
        $("body").css("min-height", vh);
        $(".page_hero_container").css("height", herovh);
        $("#contact_background").css("height", contactvh);
        $(".news_hero_container").css("height", newsvh);
    }
}




$(document).ready(screenSize);
$(window).on("orientationchange", screenSize);



