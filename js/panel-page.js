// JavaScript and jQuery for Front-end
$(document).ready(function () {

    // When the user clicks on any menu in the navbar,
    // I want the blue background to move animatedly in the clicked position
    $("nav a").click(function () {
        var position = $(this).position().top; // get clicked position
        $(".active").stop().animate({
            top: position
        }, 500);
    });
    // This function is executed when the user selects another page in the menu
    $("input[name='page']").on("change", function () {
        if (parseInt(window.innerWidth) < 480) { // If the width of the user's page was less than 480 pixels
            $("nav").animate({ height: "68px" }); // Close menu to top of page
            $("nav a").css("display", "none"); // Hide buttons
            $("nav button.show-nav").animate({ rotate: "+=180deg" }, 300); // Rotate arrow
        }
        $(".pages").removeClass("show"); // Remove all show classes form pages
        // Display the section that the user has selected in the menu
        $("#" + $(this).attr("id") + "div").addClass("show");
    });


    $("nav button.show-nav").click(function () { // Show menu if user click on arrow 
        // Let's check if the width of the user's page was less than 480 pixels
        if (parseInt(window.innerWidth) < 480) {
            if ($("nav").height() > 100) { // Check if navbar is open
                $("nav").animate({ height: "68px" }); // Close navbar
                $("nav a").css("display", "none"); // Hide buttons
                $("nav button.show-nav i").animate({ rotate: "+=180deg" }, 300); // Rotate arrow
            } else { // Check if navbar is close
                $("nav").animate({ height: "100vh" }); // Open navbar
                $("nav a").css("display", "flex"); // Display buttons
                $("nav button.show-nav i").animate({ rotate: "-=180deg" }, 300); // Rotate arrow
            }
        } else { // If the width of the user's page was more than 480 pixels
            $(".list").slideToggle(300); // Show text of buttons
            $(this).animate({ rotate: "+=180deg" }, 300); // Rotate arrow
        }
    });
    $("#search-textbox").on("focus", function () { // If user focus of search input
        $(this).css("width", "100%"); // increase input width
    });
    $("#search-textbox").on("blur", function () { // If user blur of search input
        $(this).css("width", "50%"); // Decrease input width
    });

    $("#logout").click(function () { // If user click on logout button
        window.location.href = "/Logout"; // Logout user
    });
});
// let's create function for errors
function error(text) {
    $(".error .main-error h3").text(text);
    $(".error").css("display", "flex"); // show error
}
function success(text) {
    $(".success .main-success h3").text(text);
    $(".success").css("display", "flex"); // show error
}
function confirm(text) {
    $(".confirm .main-confirm h3").text(text);
    $(".confirm").css("display", "flex"); // show error
}

function loadMsgs() {
    $.ajax({
        method: "POST",
        url: "./php/getMsgs.php",
        success: function (response) {
            response = JSON.parse(response);
            let html = "";
            response.forEach(msg => {
                html += `<div class="msg"> <div class="icons"> <h6 class="tooltip">`;
                html += msg.msg_sender_email;
                html += `<span class="tooltiptext">برای کپی کردن کلیک کنید</span> </h6>`
                html += `<i class="fa fa-trash-o fa-lg" aria-hidden="true" id="${msg.msg_id}"></i>`
                html += `<i class="fa fa-angle-down fa-2x" aria-hidden="true"></i> </div> <h3>`
                html += `${msg.msg_sender_name}</h3> <p> ${msg.msg_sender_message} </p> </div>`;
            });
            $(".msgs").html(html);
        }
    });
}

loadMsgs();

// ------------------------------------- Page 3

$("#page3div").on("click", ".msg", function () {
    if ($(this).find("p").css("position") == "relative") {
        $(this).find("i.fa-angle-down").css("transform", "rotate(0deg)");
        $(this).find("p").css("position", "absolute");
    } else {
        $(this).find("i.fa-angle-down").css("transform", "rotate(180deg)");
        $(this).find("p").css("position", "relative");
    }
});

$(".msgs").on("click", ".fa-trash-o", function (e) {
    e.preventDefault();
    confirm("آیا از حذف کردن این پیام اطمینان دارید؟");
    localStorage.setItem("del", $(this).attr("id"));
});

$(".yes").click(function (e) {
    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "./php/removeMsg.php",
        data: {
            msgId: localStorage.getItem("del")
        },
        success: function (response) {
            $(".confirm").fadeOut(200);
            if (response == "success") {
                success("با موفقیت حذف شد");
                loadMsgs();
            }
        }
    });
});

$(".msgs").on("click", "h6", function (e) {
    e.preventDefault();
    navigator.clipboard.writeText($(this).html());
    success("با موفقیت در کلیپ بورد کپی شد");
});