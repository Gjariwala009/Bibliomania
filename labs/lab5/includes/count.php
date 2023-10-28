<?php

if (!isset($_COOKIE['username'])) {
    $_COOKIE['username'] = "";
} else {
    $input = $_POST['username'];
}

setcookie('username', $input, time() * 3600 * 24);

include('login.php');
include('../index.php');
