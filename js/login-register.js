$("div.page div.main-login-register div.btns input").on("change", function () {
    if (this.id == "reg-radio") {
        $("#reg-btn").addClass("active");
        $("#login-btn").removeClass("active");
        $("#reg-form").css("display", "block");
        $("#login-form").css("display", "none");
    } else {
        $("#reg-form").css("display", "none");
        $("#login-form").css("display", "block");
        $("#login-btn").addClass("active");
        $("#reg-btn").removeClass("active");
    }
});

$('#verify').on('input', function () {
    var inputValue = $(this).val();
    var numericInput = inputValue.replace(/\D/g, "");
    $(this).val(numericInput);
});

var fiilOut = "Please fill out the form";
var ErrorBackgroundColor = "rgba(255,0,0,0.5)";

$("#register").click(function (e) {
    e.preventDefault();
    $(".inputs input").css("background-color", "rgba(0,0,0,0)");
    if ($("#username").val().trim() == "") {
        $("#username").focus();
        $("#username").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }
    if ($("#pass").val().trim() == "") {
        $("#pass").focus();
        error(fiilOut);
        return;
    }
    if ($("#pass").val().trim().length < 8) {
        $("#pass").focus();
        $("#pass").css("background-color", ErrorBackgroundColor);
        error("Password should be more than 8 characters.");
        return;
    }
    if ($("#birthdate").val().trim() == "") {
        $("#birthdate").focus();
        $("#birthdate").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }
    if ($("input[name=gen]:checked").length == 0) {
        error("Specify gender");
        return;
    }

    var data = {
        "username": $("#username").val().trim(),
        "email": $("#email").val().trim(),
        "pass": $("#pass").val().trim(),
        "birthdate": $("#birthdate").val().trim(),
        "sex": $("input[type='radio'][name='gen']:checked").val(),
    }

    $.ajax({
        type: "post",
        url: "./php/register.php",
        data: data,
        success: function (response) {
            switch (response) {
                case "invalid_code":
                    error("Verification code is incorrect.")
                    break;
                case "duplicate_username":
                    error("This email before registered.")
                    break;
                case "success":
                    error("Register was successfully.")
                    $('#reg-form').trigger("reset");
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                    break;
                default:
                    console.error(response);
                    break;
            }
        }
    });
});


$("#sendVerify").click(function (e) {
    e.preventDefault();
    $(".inputs input").css("background-color", "rgba(0,0,0,0)");
    if ($("#username").val().trim() == "") {
        $("#username").focus();
        $("#username").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }
    if ($("#phone").val().trim() == "") {
        $("#phone").focus();
        $("#phone").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }
    if ($("#pass").val().trim() == "") {
        $("#pass").focus();
        error(fiilOut);
        return;
    }
    if ($("#pass").val().trim().length < 8) {
        $("#pass").focus();
        $("#pass").css("background-color", ErrorBackgroundColor);
        error("Password should be more than 8 characters.");
        return;
    }
    if ($("#birthdate").val().trim() == "") {
        $("#birthdate").focus();
        $("#birthdate").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }
    if ($("input[name=gen]:checked").length == 0) {
        error("Specify gender");
        return;
    }

    var data = {
        "username": $("#username").val().trim(),
        "email": $("#email").val().trim(),
        "pass": $("#pass").val().trim(),
        "birthdate": $("#birthdate").val().trim()
    }

    $.ajax({
        type: "post",
        url: window.location.origin + "/php/sendVerifyCode.php",
        data: data,
        success: function (response) {
            console.log(response);
        }
    });

});

$("#login").click(function (e) {
    e.preventDefault();
    $(".inputs input").css("background-color", "rgba(0,0,0,0)");    
    if ($("#log-email").val().trim() == "") {
        $("#log-email").focus();
        $("#log-email").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }
    if ($("#log-pass").val().trim() == "") {
        $("#log-pass").focus();
        $("#log-pass").css("background-color", ErrorBackgroundColor);
        error(fiilOut);
        return;
    }

    loginData = {
        "u_email": $("#log-email").val().trim(),
        "u_pass": $("#log-pass").val().trim()
    }

    $.ajax({
        type: "POST",
        url: "./php/login.php",
        data: loginData,
        success: function (response) {
            switch (response) {
                case "success":
                    location.href = "Panel";
                    break;
                case "admin":
                    location.href = "admin";
                    break;
                case "false":
                    error("Email or username is incorrect.");
                    break;
                default:
                    console.error(response);
                    break;
            }
        }
    });

});

var error = text => {
    $("#error h3").text(text);
    $("#error").css("opacity", "1");
    setTimeout(() => {
        $("#error").css("opacity", "0");
    }, 5000);
}

$("img#close").click(function () {
    $(".fixed").css("opacity", "0");
    $(".fixed").css("visibility", "hidden");
});

$("#user").click(function (e) {
    e.preventDefault();
    $(".fixed").css("opacity", "1");
    $(".fixed").css("visibility", "visible");
});

$("#forgot-pass").click(function (e) {
    e.preventDefault();
    if ($("#log-email").val().trim() == "") {
        $("#log-email").focus();
        $("#log-email").css("background-color", ErrorBackgroundColor);
        error("Please fill out email and try again.");
        return;
    }
    if ($(this).html() != "Forgot password?") {
        console.log("Wait");
        return;
    }
    let time = 60;
    let refreshIntervalId = setInterval(() => {
        $(this).html(`${time} seconds until next attempt`);
        if (time == 0) {
            clearInterval(refreshIntervalId);
            $(this).html("Forgot password?");
        }
        time--;
    }, 1000);
    let newPassword = 1;
    while (newPassword < 1000000) {
        newPassword = Math.round(Math.random() * 10000000 + 1);
    }

    // Ajax for send sms
    $.ajax({
        type: "post",
        url: "./php/SendSms.php",
        data: {
            newPass: newPassword,
            phone: $("#log-email").val().trim()
        },
        success: function (res) {
            if (res == "success")
                error("We send new password to your email.");
            else if (res == "nobody")
                error("Please register.");
            else
                console.error(res)
        }
    });
});