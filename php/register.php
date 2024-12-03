<?php
session_start();

try {
    require "./Database.php";
    $db = new Database;
    $r = $db->getRow("users", "u_email", $_SESSION["u_email"]);
    if (!empty($r)) {
        die("duplicate_username");
    }
    $data = [
        "u_username" => $_POST["username"],
        "u_email" => $_POST["email"],
        "u_pass" => hash('ripemd160', hash('sha512', md5($_POST["pass"]))),
        "u_sex" => $_POST["sex"],
        "u_birthdate" => $_POST["birthdate"],
        "u_coin" => 0
    ];
    $inserted = $db->insert("users", $data);
    $_SESSION["u_id"] = $inserted;
    die("success");
} catch (\Throwable $th) {
    $errorFile = fopen("error.log", "a");
    fwrite($errorFile, $th);
    fclose($errorFile);
}


