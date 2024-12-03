<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/favicon.ico">
    <title>Be a detective</title>
    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/index-page.css">
</head>

<body>

    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <div class="main"></div>
    <!---------------------- Home ---------------------->
    <div id="home">
        <h1>Home</h1>
        <div class="break"></div>
        <div class="products">
            <?php
            require "./php/Database.php";
            $db = new Database;
            $res = $db->query("SELECT * FROM products WHERE products.p_id IN (SELECT i_doc FROM index_page_docs)");
            foreach ($res as $row) {
                $p_info = substr($row["p_info"], 0, 100) . "...";
                echo '<div class="product"> <img src="./' . $row["p_poster"] . '" alt=""> <h3>' . $row["p_name"] . '</h3> <p>' . $p_info . '</p> <a href="/Products">More...</a> </div>'; // ProductInformation?p=' . $row["p_id"] . '
            }
            ?>

        </div>

        <a href="Products" id="product-btn">Products</a>
    </div>

    <!---------------------- Yellow room ---------------------->

    <div id="yellow-room">
        <div>
            <p>Get ready to solve mysteries like a true detective! Our online cold case game offers an intensely
                atmospheric experience where you’ll analyze real-world-style evidence, including photos, videos, audio
                recordings, and documents. Step-by-step, you’ll piece together clues, examine hidden details, and follow
                leads to uncover the truth.</p>
            <a href="Help" id="product-btn">How to play</a>
        </div>
        <img src="img/yellow-room.jpg" alt="">
    </div>

    <!---------------------- Lost document ---------------------->

    <div id="lost-document">
        <h1>Step Into the Mind of a Detective!</h1>
    </div>

    <!---------------------- Footer ---------------------->

    <footer>
        <div class="blank"></div>

        <div class="suppques">
            <div class="support" onclick="location.href = 'Support.html'">
                <img src="img/Poshtibani.jpg" alt="">
                <h1>Support</h1>
                <p style="text-align: center;">Send us your questions, feedback, and suggestions.</p>
            </div>
            <div class="questions" onclick="location.href = 'Questions.html'">
                <img src="img/Soalat.jpg" alt="">
                <h1>FAQ</h1>
                <p style="text-align: center;">Here you can find the frequently asked questions that might come up for
                    you</p>
            </div>

            <p>
                BADETECTIVE
                Designed for those who crave a realistic, gripping detective adventure, this game puts you right in the
                heart of the investigation. Do you have what it takes to crack the case and bring justice to the
                forgotten?</p>
            <div class="links">
                <a href="https://instagram.com/beadetective_com" target="_blank"><img src="svg/instagram.svg" alt=""></a>
            </div>
        </div>

        <div class="image"></div>

    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/index-page.js"></script>
    <script src="js/nav-page.js"></script>
    
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>