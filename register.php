<?php
session_start();  
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
if ($_SESSION['logged_user'] && $_SESSION['logged_user'] != "")
{
	header("Location: index.php");
}
if ($_POST['login'] && $_POST['passwd'] && ($_POST['passwd'] == $_POST['toopasswd']) && $_POST['submit'] == "OK")
{
	$users = unserialize(file_get_contents("data/users"));
	if (!$users[$_POST['login']])
	{
		$users[$_POST['login']] = ["Password" => hash('whirlpool', $_POST['passwd']), "Acess" => 0];
		file_put_contents("data/users", serialize($users));
		$_SESSION['logged_user'] = $_POST['login'];
		header("Location: index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/login.css">
	<title>Register</title>
	<meta charset="UTF-8">
</head>
<body>
    <div class="logform">
        <a href="index.php"><img src='img/legodude.png' alt="face" title="HOME" id="face"></a>
		<h3>Enter desired Username and Password</h3>
		<h3>Then password again and press "OK"</h3>
		<hr>
        <form method="post" action="register.php" class = "form-signin">
            <input name="login" type="text" placeholder="username" id="log"/>
            <br/>
            <input name="passwd" type="password" placeholder="password" id="pass"/>
			<br>
			<input name="toopasswd" type="password" placeholder="password again" id="pass"/>
            <br>
            <input value="OK" name="submit" type="submit" id="butn"/>
		</form>
		<hr>
    </div>
</body>
</html>