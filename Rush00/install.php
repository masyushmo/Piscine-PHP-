<!DOCTYPE html>
<html>
	<head>
    	<link rel="stylesheet" href="style/adm.css">
		<title>Register</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<img class="logoimg" src="img/logo.png">

<?php if (file_exists("data/main")){ ?>
	<div class="logform">
		<h1>Installation Complete</h1>
		<div id ="installlinks">
			<a href="admin.php"><h2>Admin Panel</h2></a><br>
			<a href="index.php"><h2>HOME</h2></a>
		</div>
	</div>
	</body>
</html>
<?php } if (!file_exists("data/main")) {?>
	<div class="logform">
		<h1>Welcome to the installation process!</h1>
		<hr>
		<form method="post" action="install.php">
			<input name="title" type="text" placeholder="Site title" id="log">
			<br>
			<input class="login" type="text" name="login" placeholder="Admin login" id="log">
			<br>
			<input name="passwd" type="password" placeholder="Password" id="pass">
			<br>
			<input name="submit" type="submit" value="Install" id="butn">
		</form>
	</div>
</div>
</body>
</html>

<?php 
} 
if(!file_exists("data/main") && $_POST['title'] && $_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "Install")
{
	$users[$_POST['login']] = ["Password" => hash('whirlpool', $_POST['passwd']), "Acess" => 2];
	$data = ["Title" => $_POST['title']];
	mkdir("data", 0755);
	file_put_contents("data/main", serialize($data));
	file_put_contents("data/users", serialize($users));
	header("Refresh:0");
}
?> 
