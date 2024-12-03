<div class="fixedNav">
    <nav>
        <img src="img/Logo.png" alt="" id="logo">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="Help">How To Play</a></li>
            <li><a href="Products">Cases</a></li>
            <li><a href="Support">Support</a></li>
            <li><a href="Questions">FAQ’s</a></li>
        </ul>

        <?php
        if (isset($_SESSION["u_id"])) {
            echo '<a href="Panel"><img src="svg/user.svg" alt=""></a>';
            echo '<a href="Logout"><img src="svg/logout.svg" alt=""></a>';
        } else {
            echo '<img src="svg/user.svg" alt="" id="user">';
        }
        ?>
        <img src="svg/menu.svg" alt="" id="menu">
    </nav>
</div>