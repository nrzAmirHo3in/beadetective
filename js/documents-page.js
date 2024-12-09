$(document).ready(function () {
    var coinSum = 0;
    var coinPrice = 0;
    $("#buyCoin").click(function (e) {
        e.preventDefault();
        $("#buy-coin-dialog").show();
    });
    $("#close").click(function (e) {
        e.preventDefault();
        $("#buy-coin-dialog").hide();
    });
    $("#addCoin").click(function (e) {
        e.preventDefault();
        coinSum += 4;
        coinPrice = coinSum * 7.95;
        $("#coin-sum").html(coinSum);
        $("#coin-price").html(coinPrice);
    });
    $("#minusCoin").click(function (e) {
        e.preventDefault();
        if (coinSum > 0) {
            coinSum -= 4;
            coinPrice = coinSum * 7.95;
            $("#coin-sum").html(coinSum);
            $("#coin-price").html(coinPrice);
        }
    });

    $("#buy-coin").click(function (e) {
        e.preventDefault();
        location.replace(`../paymentGateway.php?amount=${coinPrice}&coins=${coinSum}`);
    });

    var fiilOut = "لطفا فرم را تکمیل کنید";

    function error(text) {
        $("#passwordChangerDlg .error p").html(text);
        $("#passwordChangerDlg .error").css("opacity", "1");
        $("#passwordChangerDlg .error").css("visibility", "visible");
        setTimeout(() => {
            $("#passwordChangerDlg .error").css("opacity", "0");
            $("#passwordChangerDlg .error").css("visibility", "hidden");
        }, 5000);
    }

    $("#ShowPassChangerDialog").click(function () {
        $("#passwordChangerDlg").css("opacity", "1");
        $("#passwordChangerDlg").css("visibility", "visible");
    });

    $("#closePassChanger").click(function () {
        $("#passwordChangerDlg").css("opacity", "0");
        $("#passwordChangerDlg").css("visibility", "hidden");
    });

    $("#passChanger").click(function (e) {
        e.preventDefault();
        if ($("#lastPass").val().trim() == "" || $("#newPass").val().trim() == "" || $("#newPass2").val().trim() == "") {
            error(fiilOut);
            return;
        }
        if ($("#newPass").val().trim().length < 8) {
            error("لطفا یک رمز عبور بیشتر از 8 کاراکتر وارد کنید");
            return;
        }
        if ($("#newPass").val().trim() != $("#newPass2").val().trim()) {
            error("رمز عبور و تکرار رمز عبور یکسان نیست");
            return;
        }
        $.ajax({
            method: "POST",
            url: "./php/changePass.php",
            data: {
                lastPass: $("#lastPass").val().trim(),
                newPass: $("#newPass").val().trim()
            },
            success: function (response) {
                if (response == "incorrectPass") {
                    error("رمز عبور فعلی را اشتباه وارد کردید");
                } else {
                    error("رمز عبور شما با موفقیت تغییر کرد");
                    $("#lastPass").val("");
                    $("#newPass").val("");
                    $("#newPass2").val("");

                }
            }
        });
    });
});