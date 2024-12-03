<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $row = $db->query("SELECT hint_counts FROM bought_products WHERE u_id=" . $_SESSION["u_id"] . " AND bought=" . $_SESSION["gameId"]);
    $hint_counts = $row[0]["hint_counts"];
    echo $hint_counts;
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
