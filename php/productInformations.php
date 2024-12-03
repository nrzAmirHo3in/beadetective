<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>How to play</title>
    
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/product-information-page.css">
</head>

<body>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <div class="main">
        <div class="help">
            <?php
            try {
                $id = preg_replace('/[^0-9]/', '', $get["p"]);
                require "./php/Database.php";
                $db = new Database;
                $product = $db->getRow("products", "p_id", $id);
            ?>
                <img src="<?php echo $product["p_poster"] ?>" alt="product poster">
                <h2>
                    <?php echo $product["p_name"] ?>
                </h2>
                <div class="break"></div>
                <p>
                    <?php echo $product["p_info"] ?>
                </p>
                <div class="help-footer">
                <?php
                if (isset($_SESSION["u_id"])) {
                    echo '<a href="paymentGateway.php?amount=' . $row["p_price"] . '&pid=' . $row["p_id"] . '">خرید</a>';
                } else {
                    echo '<a href="#" class="disabled">برای خرید وارد شوید</a>';
                }
            } catch (\Throwable $th) {
                $fileError = fopen("p_info.log", "a");
                fwrite($fileError, $th);
                fclose($fileError);
            }
                ?>
                <div class="info">
                    <div class="price">
                        <h5>
                            <?php
                            $p = $product["p_price"];
                            echo number_format($p);
                            ?>
                            &nbsp;&nbsp;تومان
                        </h5>
                        <img src="svg/coin.svg" alt="">
                        <p>Price</p>
                    </div>
                    <div class="difficulty">
                        <h5>
                            <?php echo $product["p_difficulty"] ?>/5
                        </h5>
                        <img src="svg/skeleton-head.svg" alt="">
                        <p>Dificalty</p>
                    </div>
                    <div class="time">
                        <h5>
                            <?php echo $product["p_time"] . " دقیقه " ?>
                        </h5>
                        <img src="svg/clock.svg" alt="">
                        <p>Time</p>
                    </div>
                </div>
                </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/nav-page.js"></script>
    <script src="js/help-page.js"></script>
    
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>