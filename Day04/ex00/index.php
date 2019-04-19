<?php
	session_start();
	if ($_GET['login'] && $_GET['passwd'] && $_GET["submit"] === "OK")
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
    }
    $log = $_SESSION['login'];
    $pas = $_SESSION['passwd'];
?>

<html><body>
	<form method="get" action=".">
		Username: <input type="text" name="login" value="<?php echo $log; ?>"/>
		<br />
		Password: <input type="password" name="passwd" value="<?php echo $pas; ?>"/>
		<input type="submit" name="submit" value="OK">
	</form>
</body></html>