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
