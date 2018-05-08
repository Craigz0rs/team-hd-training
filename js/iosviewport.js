var iOS = /iPad|iPhone|iPod|CriOS/.test(navigator.userAgent) && !window.MSStream;



function screenSize() {
    if (iOS) {
        var vh = $(window).height();
        var vhoverlay2 = vh * 0.685;
        var vhoverlay3 = vh * 0.6;

        document.getElementById('masthead').classList.remove("header_standard_size");
        $("#masthead").css("height", vh);
        $(".front_header").css("height", vh);
        $(".slider_image img").css("height", vh);
        $(".header_overlay_2").css("height", vhoverlay2);
        $(".header_overlay_3").css("height", vhoverlay3);
    }
}

$(document).ready(screenSize);
$(window).on("orientationchange", screenSize);