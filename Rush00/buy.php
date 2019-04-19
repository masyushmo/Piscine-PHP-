<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
if (!$users[$_SESSION['logged_user']])
	$_SESSION['logged_user'] = "";
if (file_exists("data/basket"))
	$basket = unserialize(file_get_contents("data/basket"));
if ($_GET['name'])
{
	$basket[$_SESSION['logged_user']][$_GET['name']] += 1;
	file_put_contents("data/basket", serialize($basket));
	header("Location:basket.php");
}
?>
