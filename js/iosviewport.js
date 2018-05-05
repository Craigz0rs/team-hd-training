var iOS = /iPad|iPhone|iPod|CriOS/.test(navigator.userAgent) && !window.MSStream;

if (iOS) {
    var vh = document.getElementById('masthead').offsetHeight;
    document.getElementById('masthead').classList.remove("header_standard_size");
    $("#masthead").css("height", vh);
    $(".slider_image img").css("height", vh);
//    $(".header_overlay_2 svg").css("height" , 'calc(' + vh + ' * 0.6 )');
//     $(".header_overlay_3 svg").css("height" , 'calc(' + vh + ' * 0.685 )');
}