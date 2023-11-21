<?php
include 'logic.php';
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
                    </div>

                    <div class="form-group" id="last_name_field">
                        <label for="last_name"><b>Last Name</b></label>
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName" id="last_name">
                    </div>

                    <div class="form-group">
                        <label for="email_address"><b>Email Address</b></label>
                        <input type="text" class="form-control" placeholder="Enter Email Address" name="emailAddress">
                    </div>

                    <div class="form-group" id="password_field">
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
                    </div>

                    <div class="form-group" id="confirm_password_field">
                        <label for="confirm_password"><b>Confirm Password</b></label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" id="confirm_password">
                    </div>

                    <div class="form-group" id="button_field">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="reset" class="btn btn-secondary" name="Reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>