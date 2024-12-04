<?php
session_start();
$msgData = [
    "msg_sender_name"=>$_POST["fname"] . " " . $_POST["lname"],
    "msg_sender_email"=>$_POST["email"],
    "msg_sender_message"=>$_POST["msg"],
];

require "./Database.php";
$db = new Database;

$db->insert("messages", $msgData);
$_SESSION["tnx"] = "tnx";
header("Location: ../Contact-us");
