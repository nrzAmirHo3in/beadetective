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
            <b>
                <p>Introduction:
            </b></p>
            <p>
                <b>Be A Detective</b> is an online whodunnit game in the cold case category. In this game, you, as a
                detective, have unsolved cases in your hands. Examine evidence, solve puzzles, and follow clues to
                reveal the truth.
            </p>
            <p>
                The cases include information about suspects and related persons, locations, reports and notes,
                interrogations, and other documents. By searching through the case files, the internet, or even relying
                on your general knowledge, you can identify the accused like an expert detective.
            </p>
            <p>Our case stories are fictional, but pay close attention to the timelines and locations to solve them
                successfully. In some cases, we’ve referenced real-world events, locations, or individuals, and we
                recommend Googling everything to uncover the truth.
            </p>
            <p>
                <br>
                Welcome to <b>Be A Detective</b>, dear detective!
                On the main page of the game, you are in your office. You usually have four key tools in your office:
            </p>
            <p>
                <b>1. Notebook:</b> <br>
                Here’s a detective’s best friend—the notebook. In this notebook, you can write down important points or
                information that you think is useful, so you can always access them and better connect the clues. The
                notebook icon is always at the bottom of your screen, like a detective who always has their notebook in
                their pocket. :)
            </p>
            <p>
                <b>2. Laptop (Case Files):</b><br>
                Use this device to review case file information and access emails, documents, interrogations, reports,
                inquiries, and more. In addition to these, the laptop features a browser that lets you access additional
                documents. (Tip: Use the full web address, e.g., www.beadetective.com). In some cases, as a detective,
                you may also have access to various inquiry systems.
            </p>
            <p>
                <b>3. Telephone (Cell Phone):</b><br>
                With this device, you can call different numbers and collect information. There may also be messages
                recorded on the answering machine. Sometimes, you can write a message using it to receive a response or
                reply.
            </p>
            <p>
                <b>4. Suspects Board:</b><br>
                You must identify suspects by collecting information and adding them to this board. The “ + “ icon on
                the side of the screen is used during interrogations or when reviewing documents to add a suspect to the
                board. Finally, you should choose your final suspect here to submit your answer.
            </p>
            <p>
                You can always use the game tips to make the path to solving the cases clearer.
            </p>
            <p>
                Let me know if further tweaks are needed!
            </p>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/nav-page.js"></script>
        <script src="js/help-page.js"></script>

        <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>