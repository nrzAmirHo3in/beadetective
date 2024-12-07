<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Profile</title>

    <link rel="stylesheet" href="css/login-register-page.css">
    <link rel="stylesheet" href="css/policies-page.css">
</head>

<body>
    <!---------------------- Login register pop up ---------------------->
    <?php require "./includes/login&register.php" ?>
    <!---------------------- Navbar ---------------------->
    <?php require "./includes/navbar.php" ?>
    <!---------------------- policies ---------------------->
    <div class="main">
        <div class="policies">
            <h2>Privacy & policies</h2>
            <div class="break"></div>
            <p>This Privacy Policy explains how BeADetective collects, uses, and protects personal data (information
                relating to an identified or identifiable individual). It applies to personal data provided directly by
                users as well as data shared with us by other organizations. We are committed to safeguarding your
                privacy and ensuring transparent and fair data processing practices.</p>

            <p>If you have any questions about this Privacy Policy or how we handle your data, please contact us at <a
                    href="mailto:support@beadetective.com">support@beadetective.com</a>.</p>

            <p>1. Data We Collect</p>
            <p>We may collect the following types of information:</p>
            <ul>
                <li><strong>Personal Data:</strong> Information you provide when registering, purchasing, or contacting
                    us, such as your name, email address, payment information, and other details necessary for accessing
                    our detective games.</li>
                <li><strong>Non-Personal Data:</strong> Data automatically collected during your interaction with the
                    website, including IP addresses, browser types, device information, and browsing behavior.</li>
            </ul>

            <p>2. How We Use Your Data</p>
            <p>We use personal data for the following purposes:</p>
            <ul>
                <li>To process orders and deliver detective games.</li>
                <li>To improve the functionality, content, and user experience of our website.</li>
                <li>To communicate with you about updates, promotional offers, or support inquiries.</li>
                <li>To ensure security, detect fraud, and comply with legal obligations.</li>
            </ul>

            <p>3. Sharing Your Data</p>
            <p>We do not sell your personal data or share it with third parties for their own marketing purposes.
                However, we may share your data under the following circumstances:</p>
            <ul>
                <li><strong>Service Providers:</strong> With trusted third parties involved in payment processing,
                    website hosting, or technical support.</li>
                <li><strong>Compliance with Laws:</strong> When required by applicable laws, regulations, or legal
                    proceedings.</li>
                <li><strong>Auditors and Advisors:</strong> With auditors, legal consultants, or other advisors to
                    manage our business operations.</li>
            </ul>
            <p>In all cases, we ensure appropriate contractual and technical safeguards are in place to protect your
                data.</p>

            <p>4. Cookies</p>
            <p>We use cookies and similar technologies to enhance your experience on our website, analyze site traffic,
                and deliver personalized content. You can manage your cookie preferences through your browser settings.
                Please note that disabling cookies may affect the functionality of the website.</p>

            <p>5. International Data Transfers</p>
            <p>If we transfer your personal data to countries with less stringent data protection laws, we will
                implement measures to ensure that your data remains secure and processed in accordance with applicable
                laws.</p>

            <p>6. Data Security</p>
            <p>We employ strict measures to protect your data, including encryption, regular audits, and staff training
                on confidentiality and information security. While we strive to protect personal data, no system is
                entirely secure, and we cannot guarantee absolute protection.</p>

            <p>7. Children’s Privacy</p>
            <p>Our website and services are not directed at children under the age of 13, and we do not knowingly
                collect personal data from them. If we discover that a child under 13 has provided personal data, we
                will delete it promptly. If you believe we have collected data from a child, please contact us at <a
                    href="mailto:support@beadetective.com">support@beadetective.com</a>.</p>

            <p>8. Your Rights</p>
            <p>You have the following rights concerning your personal data:</p>
            <ul>
                <li><strong>Access and Update:</strong> You may access or update your data at any time by contacting us
                    or through our website.</li>
                <li><strong>Withdraw Consent:</strong> If we process your data based on consent, you can withdraw this
                    consent at any time.</li>
                <li><strong>Other Rights:</strong> You may have additional rights such as the right to delete your data,
                    restrict or object to its processing, and request data portability.</li>
            </ul>
            <p>To exercise your rights, please email <a
                    href="mailto:support@beadetective.com">support@beadetective.com</a>, and we will respond promptly in
                accordance with applicable laws.</p>

            <p>9. Complaints</p>
            <p>If you believe we have misused your personal data, you may contact us at <a
                    href="mailto:support@beadetective.com">support@beadetective.com</a>, and we will investigate and
                address your concerns. If you remain dissatisfied, you can lodge a complaint with your local data
                protection authority.</p>

            <p>10. Data Retention</p>
            <p>We retain personal data only as long as necessary for the purposes it was collected or as required by
                law. Once the retention period ends, personal data is securely deleted or anonymized.</p>

            <p>If you have any questions or concerns, feel free to contact us at <a
                    href="mailto:support@beadetective.com">support@beadetective.com</a>.</p>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/nav-page.js"></script>
    <script type="text/javascript" src="js/login-register.js"></script>
</body>

</html>