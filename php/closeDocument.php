<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $db->query("UPDATE bought_products SET fixed=1 WHERE u_id=" . $_SESSION["u_id"] . " AND bought=" . $_SESSION["gameId"]);
    if ($_POST["answer"] == "true") {
        $db->query("UPDATE users SET u_coin=u_coin+3 WHERE u_id=" . $_SESSION["u_id"]);
    }
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
