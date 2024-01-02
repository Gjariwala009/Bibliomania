<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function footer()
{
    $quantity = count($_SESSION['cart']);
    echo "
    <section class='contact'>
        <div class='update'>
            <strong>Your shopping cart has $quantity items</strong>
        </div>
        <h2>Contact Us!</h2>
        <div class='email'>
            <a href='mailto:bibliomania@hotmail.com'>Email</a>
        </div>
        <div>
            <p>Mobile No.:- +1(902)-080-7745</p>
        </div>
    </section>";
}
