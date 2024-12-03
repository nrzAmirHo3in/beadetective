<?php

$_SESSION["gameId"] = $post["g_id"];
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Game</title>
    <link type="text/css" rel="stylesheet" href="css/game.css">
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>

    <div id="note"><img src="svg/note-line.svg" alt=""></div>
    <div id="hint" class="Buttons"><img src="img/hint.png" alt=""></div>
    <div id="exit" class="Buttons"><img src="svg/exit.svg" alt=""></div>
    <div id="submit" class="Buttons"><img src="svg/check.svg" alt=""></div>
    <div id="addSuspect" class="Buttons"><img src="svg/addSuspect.svg" alt=""></div>

    <section id="notebook">
        <img id="close" src="./svg/close.svg" alt="">
        <textarea id="notes"></textarea>
    </section>

    <div class="page" id="background" usemap="#workmap">

        <div id="querySystemPhoto">
            <i class="fa fa-times fa-2x" aria-hidden="true" id="closeQuerySystemPhotoBtn"></i>
            <img src="" alt="" id="imageQuerySystem">
        </div>

        <input type="text" id="searchBoxQuerySystem">
        <input type="text" id="searchBoxBrowser">

        <div class="browserInputs">
            <?php
            $game_id = $post["g_id"];
            $p_url = $post["p_url"];
            $json = file_get_contents("./" . $p_url);
            $json = json_decode($json, true);
            foreach ($json["browser"]["urls"] as $key => $value) {
                ?>
                <!-- <?php echo $value["url"] ?> -->
                <input class="inputsUandP username" type="text" id="username<?php echo $key ?>">
                <?php
                if (isset($value["accounts"][0]["pass"])) {
                    ?>
                    <input class="inputsUandP pass" type="text" id="password<?php echo $key ?>">
                    <?php
                }
                ?>
                <a href="javascript:(0)" id="<?php echo $key ?>Login" class="Buttons"></a>
                <?php
            }
            ?>
        </div>

        <!-- Browser searched image -->
        <div id="browserImg"></div>
        <a href="javascript:(0)" id="nextPhoto" class="Buttons">بعدی</a>
        <a href="javascript:(0)" id="previousPhoto" class="Buttons">قبلی</a>

        <!-- Click buttons -->
        <a href="javascript:(0)" id="laptopClickHandle" class="Buttons"></a>
        <a href="javascript:(0)" id="noteMain" class="Buttons"></a>

        <?php
        foreach ($json["Attachments"] as $value) {
            if ($value == "phone") {
                echo '<a href="javascript:(0)" id="phoneClickHandle" class="Buttons"></a>';
            }
        }
        ?>

        <a href="javascript:(0)" id="ShutDownClickHandle" class="Buttons"></a>
        <a href="javascript:(0)" id="MyCamputerClickHandle" class="Buttons"></a>

        <?php
        foreach ($json["Attachments"] as $value) {
            if ($value == "browser") {
                echo '<a href="javascript:(0)" id="ExplorerClickHandle" class="Buttons"></a>';
            }
        }
        ?>

        <?php
        foreach ($json["Attachments"] as $value) {
            if ($value == "query_system") {
                echo '<a href="javascript:(0)" id="PaintClickHandle" class="Buttons"></a>';
            }
        }
        ?>

        <a href="javascript:(0)" id="CloseClickHandle" class="Buttons"></a>
        <a href="javascript:(0)" id="SearchBrowserClickHandle" class="Buttons"></a>
        <a href="javascript:(0)" id="SearchQuerySystemClickHandle" class="Buttons"></a>

        <div class="docsBtns">
            <?php
            foreach ($json["documents"]["other"] as $key => $value) {
                echo '<a href="javascript:(0)" id="OtherDoc' . $key . 'ClickHandle" class="Buttons"></a>';
            }
            foreach ($json["documents"]["queries"] as $value) {
                echo '<a href="javascript:(0)" id="Folder' . $value["suspect_id"] . 'ClickHandle" class="Buttons"></a>';
            }
            ?>
        </div>

        <!-- Phone buttons -->
        <a href="javascript:(0)" id="closeTelephone" class="Buttons"><i class="fa fa-times fa-2x" aria-hidden="true"
                id="closeQuerySystemPhotoBtn"></i></a>
        <a href="javascript:(0)" id="phone1" class="Buttons"></a>
        <a href="javascript:(0)" id="phone2" class="Buttons"></a>
        <a href="javascript:(0)" id="phone3" class="Buttons"></a>
        <a href="javascript:(0)" id="phone4" class="Buttons"></a>
        <a href="javascript:(0)" id="phone5" class="Buttons"></a>
        <a href="javascript:(0)" id="phone6" class="Buttons"></a>
        <a href="javascript:(0)" id="phone7" class="Buttons"></a>
        <a href="javascript:(0)" id="phone8" class="Buttons"></a>
        <a href="javascript:(0)" id="phone9" class="Buttons"></a>
        <a href="javascript:(0)" id="phone0" class="Buttons"></a>
        <a href="javascript:(0)" id="phoneRing" class="Buttons"></a>
        <a href="javascript:(0)" id="phoneRemove" class="Buttons"></a>
        <h1 id="numbers"></h1>

        <!-- Suspects board -->
        <div id="Suspects" class="Buttons">

        </div>

        <!-- Hint -->

        <div id="hintPage">
            <img id="close" src="./svg/close.svg" alt="">
            <h2>راهنما</h2>
            <div id="hints"></div>
            <a href="#" id="buyHint">خرید راهنما</a>
        </div>
    </div>
    <script>
        async function fetchData() {
            const response = await fetch('./' + '<?php echo $p_url ?>');
            return await response.json();
        }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/game-page.js"></script>
</body>

</html>