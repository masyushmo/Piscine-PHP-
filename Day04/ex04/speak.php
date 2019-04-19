<?php
    session_start();
    if (($_SESSION['loggued_on_user']))
    {
        if ($_POST['msg'])
        {
            if (!file_exists('../private/chat'))
                file_put_contents('../private/chat', null);
            $fd = fopen('../private/chat', "rw");
            $text = file_get_contents('../private/chat');
            $text = unserialize($text);
            $elem['time'] = time();
            $elem['login'] = $_SESSION['loggued_on_user'];
            $elem['msg'] = $_POST['msg'];
            $text[] = $elem;
            $text = serialize($text);
            if(flock($fd, LOCK_EX))
            {
                file_put_contents('../private/chat', $text);
                flock($fd, LOCK_UN);
            }
            fclose($fd);
        }
    }
    else
        echo "ERROR\n";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
    <form action="speak.php" method="POST">
        <input type="text" name="msg" value=""/>
        <input type="submit" name="send" value="send"/>
    </form>
</body>
</html>