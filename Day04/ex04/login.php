<?php
    include 'auth.php';

    session_start();
    if ($_POST["login"] && $_POST["passwd"])
    {
        $login = $_POST["login"];
        $passwd = $_POST["passwd"];
        if (auth($login, $passwd))
        {
            $_SESSION["loggued_on_user"] = $login;
        }
        else
        {
            $_SESSION["loggued_on_user"] = "";
            echo "ERROR\n";
            header('Location: index.html');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>42</title>
</head>
<body>
    <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
    <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
</body>
</html>