<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Cases</title>
    
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/products-page.css">
</head>

<body>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <!-- Main -->
    <div class="main">
        <div class="products">
            <h2>Cases</h2>
            <div class="break"></div>
            <?php
            require "./php/Database.php";
            $db = new Database;
            $res = $db->query("SELECT * FROM products");
            if (isset($_SESSION["u_id"])) {
                $r = $db->getRow("pending_payments", "u_id", $_SESSION["u_id"]);
                if (!empty($r)) {
                    $db->delete($_SESSION["u_id"], "pending_payments", "u_id");
                }
            }
            foreach ($res as $row) {
                ?>
                <div class="product">
                    <img src="./<?php echo $row["p_poster"] ?>" alt="">
                    <div class="info">
                        <h2><?php echo $row["p_name"] ?></h2>
                        <p><?php echo $row["p_info"] ?></p>
                        <?php
                        if (isset($_SESSION["u_id"])) {
                            ?>
                            <form action="/Pay" method="post">
                                <input type="hidden" value="<?php echo $row["p_id"] ?>" name="p_id">
                                <button type="submit"><b>Buy</b></button>
                            </form>
                        <?php
                        } else {
                            echo '<a href="" class="disabled">Login for buy</a>';
                        }
                        ?>
                        <div>
                            <div class="price">
                                <h5>€<?php
                                $p = $row["p_price"];
                                echo number_format($p); ?></h5>
                                <img src="svg/coin.svg" alt="">
                                <p>Price</p>
                            </div>
                            <div class="difficulty">
                                <h5><?php echo $row["p_difficulty"] ?>/5</h5>
                                <img src="svg/skeleton-head.svg" alt="">
                                <p>Dificalty</p>
                            </div>
                            <div class="time">
                                <h5><?php echo $row["p_time"] . " Minutes " ?></h5>
                                <img src="svg/clock.svg" alt="">
                                <p>Time</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/products-page.js"></script>
    <script src="js/nav-page.js"></script>
    
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>