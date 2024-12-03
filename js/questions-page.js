$(document).ready(function () {
    $(".question").click(function () { 
        $(".question").removeClass("open");
        $(".question").find("img.arr").css("transform","rotate(0)");
        if($(this).hasClass("open")){
            $(this).removeClass("open");
            $(this).find("img.arr").css("transform","rotate(0)");
        }else{
            $(this).addClass("open");
            $(this).find("img.arr").css("transform","rotate(-90deg)");
        }
    });
});