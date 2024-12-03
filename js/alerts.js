$(document).ready(function () {
    $(".error input").click(function () {
        $(".error").fadeOut(200);
    });

    $(".success input").click(function () {
        $(".success").fadeOut(200);
    });

    $(".confirm input.cancel").click(function () {
        $(".confirm").fadeOut(200);
    });
});