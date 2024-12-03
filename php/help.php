<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>How to play</title>
    
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/help-page.css">
</head>

<body>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <div class="main">
        <div class="help">
            <h2>How to play</h2>
            <div class="break"></div>
            <div class="Introduction"><h2>Introduction:</h2></div>
            <p>
            be a detective is an online whodunnit game that is in cold case category, in the game you as a detective have unsoved cass in your hands. examine evidences, solve puzzles, follow clues: to reveal the truth.
            </p>
            <p>
            the cases include information on suspects and related persons, locations, reports and notes, interrogations, and other documents. by searching in the game files (sometimes actual google :)) ) you can find the accused in the cases like an expert detective.
            </p>
            <h2>
            <hr>
            <br>
            welcome to BeADetective, dear detective. in the main page of game you are in your office. you usually have four accesses in your office:</h2>
            <p>
            1-notebook:  here's a detectives best friend, the notebook. in this notebook you can write important points or information that you think is useful so you can always access those and find connection between the clues better. the notebook icon is always at the bottom of your screen, like a detective who always has his/her notebook in his/her pocet. :))
            </p>
            <p>
            2-laptop(clip files)  : use this devise to review file information and access emails, documents, interrogations, reports, inquiries and ...   in addition to these , there is a browser in the laptop that takes you to more documents. (tip: use full web address e.g: www.beadetective.com)  sometimes in some cases , as a detective, you have access to various inquiry systems.
            </p>
            <p>
                3-telephone (cell phone):
                with this devise, you can call different numbers and collect info from them. also, there may be some message recorded on the answering machine. some times you can write a message with  it to get a respond or reply.
            </p>
            <p>
            4- suspects board
            you must identify the suspects by collecting information and add them to ths board. the + icon on the side of the screen is used in interrogations or when checking documents to add a suspect to the table. finally, you should choose your final suspect here to submit your answer.
            </p>
            <p>
                you can always use the game tips to make the path of solving clearer for you.
            </p>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/nav-page.js"></script>
        <script src="js/help-page.js"></script>
        
        <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>