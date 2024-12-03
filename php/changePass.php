<?php
session_start();

$lastPass = hash('ripemd160', hash('sha512', md5($_POST["lastPass"])));
$newPass = hash('ripemd160', hash('sha512', md5($_POST["newPass"])));
$userId = $_SESSION["u_id"];

require "./Database.php";
$db = new Database;

$thisUser = $db->getRow("users", "u_id", $userId);

if($thisUser["u_pass"] == $lastPass){
    $db->update("users", [ "u_pass" => $newPass ], $userId, "u_id");
}else{
    die("incorrectPass");
}
