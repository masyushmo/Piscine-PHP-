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
?>
<html>
<head>
	<title>Users</title>
</head>
	<body>
		<link rel="stylesheet" href="style.css">
			<div class="logocontainer">
			<img class="logoimg" src="img/logo.png">
		</div>
		<div class="container center large">
			<h1>Users:</h1>
			<a href="createuser.php">Add User</a>
			<a href="admin.php">Back to admin panel</a>
<iframe src="users_data.php" style="width:100%;min-height:500px;max-height: 1000px" frameborder="0">

</iframe>
		</div>
	</body>
</html>