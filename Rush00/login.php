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
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK")
{
	$users = unserialize(file_get_contents("data/users"));
	if ($users[$_POST['login']] && hash('whirlpool', $_POST['passwd']) == $users[$_POST['login']]["Password"])
	{
		$_SESSION['logged_user'] = $_POST['login'];
		header("Location: index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/login.css">
	<title>Login</title>
	<meta charset="UTF-8">
</head>
<body>
    <div class="logform">
        <a href="index.php"><img src='img/legodude0.png' alt="face" title="HOME" id="face"></a>
        <h2>Enter Username and Password</h2>
        <h3>.Or create  a new account.</h3>
        <hr>
        <form method="post" action="login.php" class = "form-signin">
            <input name="login" type="text" placeholder="username" id="log"/>
            <br/>
            <input name="passwd" type="password" placeholder="password" id="pass"/>
            <br>
            <input value="OK" name="submit" type="submit" id="butn"/>
        </form>
        <br>
        <hr>
        <a href="register.php"><button><p>create an account</p></button></a><br />
        <hr>
    </div>
</body>
</html>