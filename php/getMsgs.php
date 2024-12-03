<?php

try {
    require "./Database.php";
    $db = new Database;
    $msgs = $db->getAll("messages");
    die(json_encode($msgs));
} catch (\Throwable $th) {
    $fileError = fopen("error.log", "a");
    fwrite($fileError, $th);
    fclose($fileError);
}