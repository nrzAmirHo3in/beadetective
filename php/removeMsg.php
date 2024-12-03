<?php
try {
    require "./Database.php";
    $db = new Database;
    $db->delete($_POST["msgId"], "messages", "msg_id");
    die("success");
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}