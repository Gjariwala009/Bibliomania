<div class="topnav">
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Catalogue</a>
            <div class="dropdown-content">
                <a href="index.php?genre=Fiction">Fiction</a>
                <a href="index.php?genre=Religious">Religious</a>
                <a href="index.php?genre=Non-Fiction">Non-Fiction</a>
            </div>
        </li>
        <li><a href="#">Sell Books</a></li>
        <?php
        if (isset($_COOKIE['username'])) {
            echo "<li style='float:right'><a href='logout.php'>Logout</a></li>";
        } else {
            echo "<li style='float:right'><a href='login.php'>Login</a></li>";
        }
        ?>
        <li style="float:right"><a href="cart.php">Cart</a></li>
        <li style="float:right"><a href="profile.php">Profile</a></li>
    </ul>
</div>