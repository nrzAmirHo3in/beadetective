$(document).ready(function () {
    $("#menu").click(function () {
        if ($("nav ul").css("opacity") == 0) {
            $("nav ul").css("opacity", "1");
            $("nav ul").css("visibility", "visible");
        } else {
            $("nav ul").css("opacity", "0");
            $("nav ul").css("visibility", "hidden");
        }
    });
    if ($(window).width() >=! 1040) {
        $("nav").css("background", "#222");
        $("nav").css("height", "70px");
        $("#logo").css("width", "150px");
        $("nav").css("top", "0");
        $("nav ul li a").css("font-size", "var(--text-font)");
    }
    $(window).scroll(function () {
        if ($(window).width() >= 1040) {
            var scroll = $(window).scrollTop();
            if (scroll != 0) {
                $("nav").css("background", "#222");
                $("nav").css("height", "70px");
                $("#logo").css("width", "150px");
                $("nav").css("top", "0");
                $("nav ul li a").css("font-size", "var(--text-font)");
            }
            if (scroll == 0) {
                $("nav").css("background", "rgba(0,0,0,0)");
                $("nav").css("height", "100px");
                $("#logo").css("width", "250px");
                $("nav").css("top", "20px");
                $("nav ul li a").css("font-size", "var(--subtitle-font)");
            }
        }
    });
});