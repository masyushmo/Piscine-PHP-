<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
$orders = unserialize(file_get_contents("data/orders"));
if ($users[$_SESSION['logged_user']]["Acess"] < 1)
{
	header("Location: index.php");
}
unset($orders[$_GET['id']]);
file_put_contents("data/orders", serialize($orders));
header("Location: orders_data.php");
?>