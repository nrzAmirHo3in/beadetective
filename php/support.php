<?php session_start() ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Support</title>
    
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/support-page.css">
</head>

<body>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <?php
    if ($_SESSION["tnx"] == "tnx") {
        unset($_SESSION["tnx"]);
        echo '<div id="success"><h3>با تشکر از ثبت نظر شما</h3></div>';
    }
    ?>
    <div class="main">
        <div class="support">
            <h2>Support</h2>
            <div class="break"></div>
            <div class="sendEmail">
                <p>
                    If you have any questions or problems, fill out the form below. we will be happy to hear your suggestions too. be curios :))
                </p>
                <div>
                    <form action="./php/sendMessage.php" method="post">
                        <div class="fname">
                            <p>Full name</p>
                            <input type="text" name="fname" placeholder="Full name..." required>
                        </div>
                        <div class="email">
                            <p>Email</p>
                            <input type="email" name="email" placeholder="Email..." required>
                        </div>
                        <div class="message">
                            <p>Message</p>
                            <textarea name="msg" placeholder="Message..." resize="resize" required></textarea>
                        </div>
                        <input type="submit" value="Send">
                    </form>
                    <img src="img/send-email.jpg" alt="">
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/nav-page.js"></script>
    <script src="js/support-page.js"></script>
    
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>