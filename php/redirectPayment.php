<?php
session_start();

try {

    $errors = array(
        "-1" => "در انتظار پردخت",
        "-2" => "خطای داخلی",
        "1" => "پرداخت شده - تاییدشده",
        "2" => "پرداخت شده - تاییدنشده",
        "3" => "لغوشده توسط کاربر",
        "4" => "‌شماره کارت نامعتبر می‌باشد.",
        "5" => "‌موجودی حساب کافی نمی‌باشد.",
        "6" => "رمز واردشده اشتباه می‌باشد.",
        "7" => "‌تعداد درخواست‌ها بیش از حد مجاز می‌باشد.",
        "8" => "‌تعداد پرداخت اینترنتی روزانه بیش از حد مجاز می‌باشد.",
        "9" => "مبلغ پرداخت اینترنتی روزانه بیش از حد مجاز می‌باشد.",
        "10" => "‌صادرکننده‌ی کارت نامعتبر می‌باشد.",
        "11" => "‌خطای سوییچ",
        "12" => "کارت قابل دسترسی نمی‌باشد.",
    );

    require "Database.php";
    $db = new Database;

    date_default_timezone_set('Asia/Tehran');
    $date = date('Y-m-d H:i:s', time());

    // $_SESSION["success"] = $_GET["success"];
    $_SESSION["Status"] = $_GET["status"];
    $_SESSION["Message"] = $errors[$_GET["status"]];
    // $_SESSION["trackId"] = $_GET["trackId"];

    // Let's verify the payment
    require "./curl.php";
    $verifyRes = sendCurl(array(
        "merchant" => "665308f9e7fe288876e6e902",
        "trackId" => $_GET["trackId"]
    ), "https://gateway.zibal.ir/v1/verify");

    // Define informations
    $description = explode("_", $verifyRes["description"]);
    $u_phone = $description[0];
    $product = $description[1];
    $p = explode("=", $product);

    // Check if payment was success
    if ($_GET["success"] == 1) {
        $userInfo = $db->getRow("users", "u_phone", $u_phone);
        if ($p[0] == "P") {
            $db->insert("bought_products", [
                "u_id" => $userInfo["u_id"],
                "bought" => $p[1]
            ]);
        } elseif ($p[0] == "C") {
            $db->query("UPDATE users SET u_coin=u_coin+" . $p[1] . " WHERE u_id=" . $userInfo["u_id"]);
        }
    }

    // Logging
    $th = "Status code: " . $_GET["status"] . " User ID: " . $userInfo["u_id"] . " trackId: " . $_GET["trackId"] . ": " . $date . ": " . $errors[$_GET["status"]] . "\n";
    $fileError = fopen("redirect.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);

    // Redirect to show success 
    // header("Location:/PaymentInfo");

    echo '<form method="post" action="../paymentInfo.php" id="payForm">';
    echo '<input type="hidden" name="refNumber" value="' . $verifyRes["refNumber"] . '" />';
    echo '<input type="hidden" name="success" value="' . $_GET["success"] . '" />';
    echo '<input type="hidden" name="amount" value="' . $verifyRes["amount"] . '" />';
    echo '<input type="hidden" name="Message" value="' . $errors[$_GET["status"]] . '" />';
    echo '</form>';
    echo '<script>document.getElementById("payForm").submit()</script>';
} catch (\Throwable $th) {
    $fileError = fopen("redirect_error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
