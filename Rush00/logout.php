<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$_SESSION['logged_user'] = "";
header("Location: index.php");
 ?>