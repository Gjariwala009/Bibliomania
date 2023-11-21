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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration Form</title>
</head>

<body>
    <main>
        <div class="container col-md-12">
            <form action="index.php" method="post" class="mx-auto">
                <h1> Registration Form </h1>
                <div id="container">

                    <div class="form-group" id="first_name_field">
                        <label for="first_name"><b>First Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="firstName" id="first_name">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["submit"])) {
                                if (!empty($firstName) && !filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z]+( [a-zA-Z]+)*$/")))) {
                                    echo $errorFirstName;
                                    $isValid = false;
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group" id="last_name_field">
                        <label for="last_name"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName" id="last_name">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["submit"])) {
                                if (!empty($lastName) && !filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-z'-]+$/")))) {
                                    echo $errorLastName;
                                    $isValid = false;
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="email_address"><b>Email Address</b></label>
                        <input type="text" class="form-control" placeholder="Enter Email Address" name="emailAddress">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["submit"])) {
                                if (!empty($emailAddress) && !filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                                    echo $errorEmail;
                                    $isValid = false;
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group" id="password_field">
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["submit"])) {
                                if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/")))) {
                                    echo $errorPassword;
                                    $isValid = false;
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group" id="confirm_password_field">
                        <label for="confirm_password"><b>Confirm Password</b></label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" id="confirm_password">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["submit"])) {
                                if ($password != $confirmPassword) {
                                    echo $errorConfirmPassword;
                                    $isValid = false;
                                }
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group" id="button_field">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["submit"])) {
                                if ($isValid) {
                                    header("Location: welcome.php");
                                    exit;
                                }
                            }
                        }
                        ?>
                        <button type="reset" class="btn btn-secondary" name="Reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>