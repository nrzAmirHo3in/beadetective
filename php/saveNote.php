<?php
session_start();
try {
    require "./Database.php";
    $db = new Database;
    $db->update("bought_products", ["note" => $_POST["note"]], $_SESSION["u_id"], "u_id");
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}
