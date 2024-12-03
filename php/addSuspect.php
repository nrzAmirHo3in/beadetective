<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $row = $db->query("SELECT * FROM bought_products WHERE u_id=" . $_SESSION["u_id"] . " AND bought=" . $_SESSION["gameId"]);
    $suspects = json_decode($row[0]["suspects"]);
    if ($suspects != null) {
        array_push($suspects, intval($_POST["suspect"]));
        $suspects = array_unique($suspects);
    }else{
        $suspects = [];
        $suspects[0] = intval($_POST["suspect"]);
    }
    $row = $db->query("UPDATE bought_products SET suspects='" . json_encode($suspects) . "' WHERE u_id=" . $_SESSION["u_id"] . " AND bought=" . $_SESSION["gameId"]);
    echo "success";
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}