<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>FAQ's</title>
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/questions-page.css">
</head>

<body>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <div class="main">
        <div class="questions">
            <h2>Questions</h2>
            <div class="break"></div>
            <div class="qns">
                <div class="question">
                    <h2>How to play a case?</h2>
                    <p>                
                        to run each of the casefiles, you must first go to the product page and select the desired case. complete the purchase and execute yur casefile. you can access your purchased cases through your profile section.
                    </p>
                    <img src="svg/arrow.svg" class="arr" alt="">
                </div>
                <div class="question">
                    <h2>What is COIN  and how to get them?</h2>
                    <p>
                    COINs in the game can be used to get hints in cases. you get 3 COINs by soving each case correctly or you can buy them !
                    </p>
                    <img src="svg/arrow.svg" alt="" class="arr">
                </div>
                <div class="question">
                    <h2>Can I pause and resume the case at any time?</h2>
                    <p>
                    of course you can.You can pause your investigation at any point and resume whenever you’re ready to solve the mystery.
                    </p>
                    <img src="svg/arrow.svg" class="arr" alt="">
                </div>
                <div class="question">
                    <h2>Is there an age limit for players?</h2>
                    <p>
                    Our game are best suited for players aged 13 and above due to the complexity of the puzzles and the nature of the content. However, younger detectives are welcome to join with guidance from an adult.
                    </p>
                    <img src="svg/arrow.svg" class="arr" alt="">
                </div>
                <div class="question">
                    <h2>What i need to play the game?</h2>
                    <p>
                    All you need is an internet connection and a devise like laptops, PCs, your mobile and... our games are currently only available in English.
                    </p>
                    <img src="svg/arrow.svg" class="arr" alt="">
                </div>
                <div class="question">
                    <h2>What if I have any questions or issues with the game?</h2>
                    <p>
                    For immediate assistance, please don’t hesitate to reach out to us. Simply fill out the contact form available on our website’s support page. Our team is ready to provide you with the help you need, from troubleshooting technical issues to answering any gameplay queries you might have. Let us help you get back to solving mysteries with ease and confidence.
                    </p>
                    <img src="svg/arrow.svg" class="arr" alt="">
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/nav-page.js"></script>
    <script src="js/questions-page.js"></script>
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>