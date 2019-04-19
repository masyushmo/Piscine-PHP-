<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
if ($users[$_SESSION['logged_user']]["Acess"] < 1)
{
	header("Location: index.php");
}
if ($_GET['set'] == "delete")
{
	unset($users[$_GET['login']]);
}
if ($_GET['set'] == "admin")
	$users[$_GET['login']]['Acess'] = 1;
if ($_GET['set'] == "user")
	$users[$_GET['login']]['Acess'] = 0;
file_put_contents("data/users", serialize($users));
header("Location:users_data.php");
?>