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
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit']  == "OK")
{
	$users = unserialize(file_get_contents("data/users"));
	if (!$users[$_POST['login']])
	{
		$users[$_POST['login']] = ["Password" => hash('whirlpool', $_POST['passwd']), "Acess" => $_POST['accesslevel']];
		file_put_contents("data/users", serialize($users));
		header("Location: users.php");
	}
}
 ?>
 <html>
	<body>
		<link rel="stylesheet" href="style.css">
			<div class="logocontainer">
			<img class="logoimg" src="img/logo.png">
		</div>
		<div class="container center">
			<h1>Create User</h1>
			<a href="users.php">Back to Users</a>
		<form method="post" action="createuser.php">
			<label for="login">Login: </label><input id="login" name="login" type="text">
			<br>
			<label for="password">Password: </label><input id="password" name="passwd" type="password">
			<br>
			<label for="accesslevel">Access Level: </label><select name="accesslevel" id="accesslevel">
				<option value="0">0</option>
				<option value="1">1</option>
				</select><br>
			<input value="OK" name="submit" type="submit">
		</form>	
		</div>
	</body>
</html>