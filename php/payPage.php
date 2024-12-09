<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/favicon.ico">
    <title>Product Purchase Form</title>
    <link rel="stylesheet" href="./css/pay-page.css">
</head>

<body>
    <?php
    require "./php/Database.php";
    $db = new Database;
    $pid = $post["p_id"];
    $res = $db->getRow("products", "p_id", $pid);
    $des = (strlen($res["p_info"]) > 200) ? substr($res["p_info"], 0, 200)  . "..." : $res["p_info"];
    ?>
    <div class="container">
        <div class="product-info">
            <h2><?php echo $res["p_name"] ?></h2>
            <img src="./<?php echo $res["p_poster"] ?>" alt="Product Image">
            <p><strong>Description:</strong> <?php echo $des ?> </p>
            <p><strong>Price:</strong> €<?php echo $res["p_price"] ?></p>
        </div>

        <div class="form-container">
            <h1>Purchase Form</h1>
            <form id="purchaseForm">

                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" required>

                <!-- Country field second -->
                <label for="country">Country:</label>
                <select id="country" required onchange="populateCities()">
                    <option value="">Select Country</option>
                </select>
                <!-- City field first -->
                <label for="city">City:</label>
                <select id="city" required>
                    <option value="">Select City</option>
                </select>

                <label for="billingAddress">Billing Address:</label>
                <input type="text" id="billingAddress" required placeholder="Address">

                <label for="EmailAddress">Email Address:</label>
                <input type="text" id="EmailAddress" required placeholder="Email Address">

                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" required>

                <label for="cardInfo">Card Information:</label>
                <input type="text" class="card-number" placeholder="Card Number" maxlength="19" inputmode="numeric"
                    pattern="[0-9\s]*" required>
                <div class="date-field">
                    <select name="month" required>
                        <option value="" disabled selected>Month</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="year" required>
                        <option value="" disabled selected>Year</option>
                        <!-- Add years dynamically or statically -->
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2025">2026</option>
                        <option value="2025">2027</option>
                        <option value="2025">2028</option>
                        <option value="2025">2029</option>
                        <option value="2025">2030</option>
                        <option value="2025">2031</option>
                        <option value="2025">2032</option>
                        <option value="2025">2033</option>
                        <option value="2025">2034</option>
                        <option value="2025">2035</option>
                        <option value="2025">2036</option>
                        <option value="2025">2037</option>
                        <option value="2025">2038</option>
                        <option value="2025">2039</option>
                        <option value="2025">2040</option>
                    </select>
                </div>
                <input type="text" class="cvv-input" placeholder="CVV" maxlength="3" inputmode="numeric"
                    pattern="[0-9]*" required>

                <div style="margin: 10px 0;">
                    <input type="checkbox" id="confirmPolicies" required>
                    <label for="confirmPolicies">I confirm I have read and agree to the <a
                            href="/Policies">Privacy & policies</a>.</label>
                </div>

                <button type="submit" style="margin: 10px 0;">Submit Purchase</button>
                <button onclick="location.href='/Products'">Cancel Purchase</button>
            </form>

            <div class="response" id="responseMessage" style="display:none;"></div>
        </div>
    </div>
    <script src="./js/pay-page.js"></script>

</body>

</html>