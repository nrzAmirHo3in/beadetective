<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $row = $db->query("SELECT suspects FROM bought_products WHERE u_id='" . $_SESSION["u_id"] . "' AND bought=" . $_SESSION["gameId"]);
    $suspects = $row[0]["suspects"];
    echo $suspects;
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
