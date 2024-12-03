<?php
$style = isset($_SESSION["verifyCode"]) ? "opacity: 1; visibility: visible;" : "";
?>
<div class="fixed" style="<?php echo $style ?>">
    <div id="login-register">
        <div id="error">
            <h3></h3>
        </div>
        <div class="page">
            <img src="svg/close.svg" alt="" id="close">
            <img src="img/Logo.png" alt="" class="logo">
            <img src="img/login-image.jpg" alt="" class="image">
            <div class="main-login-register">
                <div class="btns">
                    <label for="reg-radio">
                        <p id="reg-btn" class="active">Register</p>
                    </label>
                    <label for="login-radio">
                        <p id="login-btn">Login</p>
                    </label>
                    <input type="radio" name="tab" id="reg-radio" checked>
                    <input type="radio" name="tab" id="login-radio">
                </div>
                <!---------------- Register --------------->
                <form class="form" id="reg-form" action="./php/register.php" method="post">
                    <div class="inputs">
                        <input type="text" id="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputs">
                        <input type="email" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputs">
                        <input type="password" id="pass" required>
                        <label for="pass">Password</label>
                    </div>
                    <div class="inputs">
                        <input type="date" id="birthdate">
                        <label for="birthdate">Birthday</label>
                    </div>
                    <div id="gender">
                        <label for="gender">Sexual:</label>
                        <label for="female">Female</label>
                        <input type="radio" name="gen" id="female" value="female">
                        <label for="male">Male</label>
                        <input type="radio" name="gen" id="male" value="male">
                    </div>
                    <a href="javascript:{}" id="register">Register</a>
                    <!-- <label for="changePhone" class="change"><a href="Logout" id="changePhone">Change email
                            address</a></label> -->
                    <label for="login-radio" class="change">I have already registered</label>
                </form>
                <!---------------- Login --------------->
                <div class="form" id="login-form">
                    <div class="inputs">
                        <input type="email" id="log-email" required>
                        <label for="log-email">Email</label>
                    </div>
                    <div class="inputs">
                        <input type="password" id="log-pass" required>
                        <label for="pass">Password</label>
                    </div>
                    <a href="#" id="login">Login</a>
                    <label for="reg-radio" class="change">I haven't already registered</label>
                    <label for="" class="change" id="forgot-pass">Forgot my password</label>
                </div>
            </div>
        </div>
    </div>
</div>