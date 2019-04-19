<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
if ($_SESSION['logged_user'] && $users[$_SESSION['logged_user']]["Acess"] < 1)
	header("Location: index.php");
if (!$_SESSION['logged_user'] || $_SESSION['logged_user'] == "")
{
	if ($users[$_POST['login']]["Acess"] >= 1 && hash('whirlpool', $_POST['passwd']) == $users[$_POST['login']]['Password'] && $_POST['submit'] == "OK")
	{
		$_SESSION['logged_user'] = $_POST['login'];
		header("Refresh:0");
	}
	else
	{
		$_SESSION['logged_user'] = "";
	}
?>
<html>
	<body>
		<link rel="stylesheet" href="style.css">
			<div class="logocontainer">
			<img class="logoimg" src="img/logo.png">
		</div>
		<div class="container center">
			<h1>Welcome to Admin login page!</h1>
		<form method="post" action="admin.php">
			<label for="login">Login: </label><input id="login" name="login" type="text">
			<br>
			<label for="password">Password: </label><input id="password" name="passwd" type="password">
			<br>
			<input value="OK" name="submit" type="submit">
		</form>	
		</div>
	</body>
</html>
<?php }
else {
?>
<html>
	<body>
		<link rel="stylesheet" href="style.css">
			<div class="logocontainer">
			<img class="logoimg" src="img/logo.png">
		</div>
		<div class="container center">
			<h1>Welcome to Admin Panel!</h1>
			<a href="products.php">Products</a><br>
			<a href="categories.php">Categories</a><br>
			<a href="users.php">Users</a><br>
			<a href="index.php">Home</a><br>
			<a href="orders.php">Orders</a><br>
			<a href="logout.php">Log Out</a>
		</div>
	</body>
</html>

<?php 
}
 ?>