<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$basket = unserialize(file_get_contents("data/basket"));
unset($basket[$_SESSION['logged_user']]);
file_put_contents("data/basket", serialize($basket));
header("Location:basket.php");