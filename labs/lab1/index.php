<?php
$num1 = 10;
$num2 = 1;
$display = true;
$total = 20;
for ($i = 0; $i < 20 && $display; $i++) {
	if ($total < 20 && $total >= 10) {
		echo "Hello World! " . "Hope you are doing good!" . "<br>";
	}
	if ($i === 10 && $display) {
		echo "Hit 10! Bye Bye!";
		$display = false;
	}
	$total--;
}
