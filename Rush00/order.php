<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
	if (file_exists("data/orders"))
		$orders = unserialize(file_get_contents("data/orders"));
$products = unserialize(file_get_contents("data/products"));
$basket = unserialize(file_get_contents("data/basket"));
$total = 0;
	foreach ($basket[$_SESSION['logged_user']] as $prodname => $count) {
		foreach ($products as $key => $product) {
		if ($product['Name'] == $prodname)
		{
			$total += ($product['Price'] * $count) . "$<br>";
			$msg[] = $product["Name"] . " x " . $count . " " . ($products[$key]["Price"] * $count) . "$";
		}
	}
}
date_default_timezone_set("Europe/Kiev");
$orders[] = ["Name" => $_SESSION['logged_user'], "MSG" => $msg, "Total" => $total, "Time" => date("F j, Y, g:i a")];
file_put_contents("data/orders", serialize($orders));
unset($basket[$_SESSION['logged_user']]);
file_put_contents("data/basket", serialize($basket));
header("Location: index.php");
?>