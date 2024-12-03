<?php
session_start();
if (!isset($_SESSION["u_id"])) {
    echo "<script> location.href='/'; </script>";
}
unset($_SESSION["gameId"]);
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Profile</title>
    
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/documents-page.css">
</head>

<body>
    <div id="buy-coin-dialog">
        <div>
            <img id="close" src="./svg/close.svg" alt="">
            <h3>Coin(s)</h3>
            <span id="addCoin"><i class="fa fa-plus" aria-hidden="true"></i></span>
            <h2 id="coin-sum">0</h2><span id="minusCoin"><i class="fa fa-minus" aria-hidden="true"></i></span>
            <p>Price: $<span id="coin-price">0</span></p>
            <button id="buy-coin">Buy coin</button>
        </div>
    </div>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <!---------------------- Pssword changer dialag ---------------------->
    <div id="passwordChangerDlg">
        <div class="error">
            <p id="errorText">Simple error</p>
        </div>
        <form action="#" method="post">
            <img id="closePassChanger" src="./svg/close.svg" alt="">
            <div class="inputs">
                <input required type="password" id="lastPass">
                <label for="lastPass">Current password</label>
            </div>
            <div class="inputs">
                <input required type="password" id="newPass">
                <label for="newPass">New password</label>
            </div>
            <div class="inputs">
                <input required type="password" id="newPass2">
                <label for="newPass2">Repeat new password</label>
            </div>
            <button id="passChanger">Save</button>
        </form>
    </div>
    <!---------------------- Profile ---------------------->
    <div class="main">
        <div class="profile">
            <div class="prof">
                <?php
                require "./php/Database.php";
                $db = new Database;
                $inf = $db->getRow("users", "u_id", $_SESSION["u_id"]);
                if ($inf["u_sex"] == "male")
                    echo '<img src="img/male-profile.jpg" alt="">';
                else
                    echo '<img src="img/female-profile.jpg" alt="">';
                ?>
                <h3>
                    <?php echo $_SESSION["u_username"] ?>
                </h3>
            </div>
            <div class="coin">
                <img src="img/coin.png" alt="">
                <h4>
                    <?php
                    echo $inf["u_coin"];
                    ?>
                </h4>
                <div class="coin"><a href="#" id="buyCoin">Buy coin</a></div>
            </div>
            <div class="solved">
                <h3>Solved Case(s): </h3>
                <h2>
                    <?php
                    $count = $db->query("SELECT COUNT(*)
                    FROM bought_products 
                    INNER JOIN products ON products.p_id = bought_products.bought
                    WHERE bought_products.u_id = " . $_SESSION["u_id"] . " AND bought_products.fixed = 1");
                    print_r($count[0]["COUNT(*)"]);
                    ?>
                </h2>
            </div>
            <ul>
                <li><a href="javascript:(0)" id="ShowPassChangerDialog">Change password</a></li>
            </ul>
        </div>
    </div>

    <!---------------------- Documents ---------------------->

    <div class="docs">
        <h2>Cases</h2>
        <div class="break"></div>
        <div class="documents">
            <?php
            if (isset($_SESSION["u_id"])) {
                $r = $db->getRow("pending_payments", "u_id", $_SESSION["u_id"]);
                if (!empty($r)) {
                    $db->delete($_SESSION["u_id"], "pending_payments", "u_id");
                }
            }
            $res = $db->query("SELECT bought_products.bought, bought_products.fixed, products.p_name, products.p_poster, products.p_file, products.p_id
            FROM bought_products 
            INNER JOIN products ON products.p_id = bought_products.bought
            WHERE bought_products.u_id = " . $_SESSION["u_id"]);
            foreach ($res as $row) {
                if ($row["fixed"] == 1) {
                    echo '
                    <div class="doc" style="background-image: url(' . $row["p_poster"] . ');">
                        <div class="darker"></div>
                        <h2>' . $row["p_name"] . '</h2>
                        <img src="img/solved.png" class="solved" alt="">
                    </div>';
                } else {
                    echo '
                    <div class="doc" style="background-image: url(' . $row["p_poster"] . ');">
                        <div class="darker"></div>
                        <h2>' . $row["p_name"] . '</h2>
                        <form action="/Game" method="post">
                            <input type="hidden" value="' . $row["p_file"] . '" name="p_url">
                            <input type="hidden" value="' . $row["p_id"] . '" name="g_id">
                            <button type="submit">
                            در حال حل
                                <img src="svg/search-white.svg" alt="">
                            </button>
                        </form>
                    </div>';
                }
            }
            ?>
        </div>
    </div>




    <script src="js/jquery.min.js"></script>
    <script src="js/nav-page.js"></script>
    <script src="js/documents-page.js"></script>
    
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>