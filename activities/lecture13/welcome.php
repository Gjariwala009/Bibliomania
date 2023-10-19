<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Cookie Counter</title>
	<meta name="description" content="Registration Page (Loops)">
	<meta name="author" content="Gabriella Mosquera">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section id="container">
		<form action="index.php" method="post">

			<label>Username: </label>
			<input type="text" class="username" placeholder="user-input" name="user-input" id="user-input">
			<input type="submit" name="submit" value="Submit">

		</form>
		<?php
		if (isset($input) && !empty($input)) {
			echo "<h1>Welcome " . $input . " to my page!</h1>";
		}

		?>


	</section>
</body>

</html>