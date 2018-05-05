var iOS = /iPad|iPhone|iPod|CriOS/.test(navigator.userAgent) && !window.MSStream;

if (iOS) {
    var vh = document.getElementById('masthead').offsetHeight;
    document.getElementById('masthead').classList.remove("header_standard_size");
    $("#masthead").css("height", vh);
    $(".slider_image img").css("height", vh);
}