<?php
session_start();
require "Database.php";
$db = new Database;
$data = [
    "u_email" => $_POST["u_email"],
    "u_pass" => hash('ripemd160', hash('sha512', md5($_POST["u_pass"])))
];
$res = $db->login($data, "users");
if ($res == false) {
    die("false");
} else {
    if ($res["u_email"] == "09179019023") {
        $_SESSION["admin"] = $res["u_id"];
        die("admin");
    } else {
        $_SESSION["u_id"] = $res["u_id"];
        $_SESSION["u_email"] = $res["u_email"];
        $_SESSION["u_username"] = $res["u_username"];
        die("success");
    }
}