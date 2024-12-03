<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $userInf = $db->getRow("users", "u_id", $_SESSION["u_id"]);
    if ($userInf["u_coin"] > 0)
        $db->query("UPDATE users SET u_coin=u_coin-1 WHERE u_id=" . $_SESSION["u_id"]);
    else
        die("no_coins");
    $db->query("UPDATE bought_products SET hint_counts = hint_counts + 1 WHERE u_id=" . $_SESSION["u_id"] . " AND bought=" . $_SESSION["gameId"]);
    $row = $db->query("SELECT hint_counts FROM bought_products WHERE u_id=" . $_SESSION["u_id"] . " AND bought=" . $_SESSION["gameId"]);
    $hint_counts = $row[0]["hint_counts"];
    echo $hint_counts;
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
