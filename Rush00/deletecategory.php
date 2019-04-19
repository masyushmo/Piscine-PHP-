<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
$products = unserialize(file_get_contents("data/products"));
if ($users[$_SESSION['logged_user']]["Acess"] < 1)
{
	header("Location: index.php");
}
$categories = unserialize(file_get_contents("data/categories"));
foreach ($products as $key => $product) {
	foreach ($product['Categories'] as $key2 => $value2) {
		if ($value2 == $_GET['id'])
			unset($products[$key]['Categories'][$key2]);
	}
}
unset($categories[$_GET['id']]);
file_put_contents("data/categories", serialize($categories));
file_put_contents("data/products", serialize($products));
header("Location:categories_data.php");
?>