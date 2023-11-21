<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $isValid = true;

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $emailAddress = $_POST["emailAddress"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        $errorFirstName = "<p class=\"text-alert\">Invalid First Name. Use letters only.</p>";
        $errorLastName = "<p class=\"text-alert\">Invalid Last Name. Use letters and apostrophe’s only</p>";
        $errorEmail = "<p class=\"text-alert\">Invalid Email Address</p>";
        $errorPassword =  "<p class=\"text-alert\">Invalid Format for Password</p>";

        $errorConfirmPassword = "<p class=\"text-alert\">Passwords do not match! Try again.</p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if (!empty($firstName) && !filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]+( [a-zA-Z]+)*$/")))) {
            echo $errorFirstName;
            $isValid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if (!empty($lastName) && !filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-z'-]+$/")))) {
            echo $errorLastName;
            $isValid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if (!empty($emailAddress) && !filter_var($emailAddress, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/')))) {
            echo $errorEmail;
            $isValid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/")))) {
            echo $errorPassword;
            $isValid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if ($password != $confirmPassword) {
            echo $errorConfirmPassword;
            $isValid = false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if ($isValid) {
            header("Location: welcome.php");
            exit;
        }
    }
}
