<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
$categories = unserialize(file_get_contents("data/categories"));
if ($users[$_SESSION['logged_user']]["Acess"] < 1)
{
	header("Location: index.php");
}
$products = unserialize(file_get_contents("data/products"));
unlink($products[$_GET['id']]['Photo']);
foreach ($categories as $catname => $value) {
	foreach ($value as $key => $value2) {
		if ($value2 == $products[$_GET['id']]['Name'])
			unset($categories[$catname][$key]);
	}
}
unset($products[$_GET['id']]);
file_put_contents("data/categories", serialize($categories));
file_put_contents("data/products", serialize($products));
header("Location:products_data.php");
?>