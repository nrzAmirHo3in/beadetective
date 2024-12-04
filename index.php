<?php session_start(); error_reporting(E_ERROR | E_PARSE); ?>

<head>
    <link href='https://fonts.googleapis.com/css?family=Plus Jakarta Sans' rel='stylesheet'>
</head>

<?php

require_once __DIR__ . "/vendor/autoload.php";

use SimpleTools\Router;

$router = new Router;

$pages = [
    "/",
    "/Contact-us",
    "/Help",
    "/Products",
    "/Questions",
    "/admin",
    "/Game",
    "/Panel",
    "/Logout",
    "/ProductInformation"
];

$requestUri = parse_url($_SERVER['REQUEST_URI']);
$requestPath = $requestUri["path"];

$flag = false;
foreach ($pages as $page) {
    if ($page == $requestPath) {
        $flag = true;
    }
}

if ($flag) {
    $router->get("/", function () {
        require_once __DIR__ . "/php/Home.php";
    });

    $router->get("/Help", function () {
        require_once __DIR__ . "/php/help.php";
    });

    $router->get("/Products", function () {
        require_once __DIR__ . "/php/products.php";
    });

    $router->get("/Contact-us", function () {
        require_once __DIR__ . "/php/support.php";
    });

    $router->get("/Panel", function () {
        require_once __DIR__ . "/php/documents.php";
    });

    $router->get("/Questions", function () {
        require_once __DIR__ . "/php/questions.php";
    });

    $router->post("/Game", function ($post) {
        require_once __DIR__ . "/php/Game.php";
    });

    $router->get("/Logout", function () {
        session_destroy();
        echo "<script> location.href='/'; </script>";
    });

    $router->get("/admin", function () {
        require_once __DIR__ . "/php/panel.php";
    });

    $router->get("/ProductInformation", function ($get) {
        require_once __DIR__ . "/php/productInformations.php";
    });

    $router->post("/PaymentInfo", function ($post) {
        require_once __DIR__ . "/paymentInfo.php";
    });
} else {
    header("HTTP/1.0 404 Not Found");
}

$router->run();