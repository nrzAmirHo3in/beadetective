<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $inf = $db->getRow("bought_products", "u_id", $_SESSION["u_id"]);
    die($inf["note"]);
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
