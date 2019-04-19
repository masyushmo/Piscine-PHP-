<?php
    session_start();
    date_default_timezone_set( 'Europe/Moscow' );
    if (($_SESSION['loggued_on_user']))
    {
        if (file_exists('../private') && file_exists('../private/chat'))
        {
            $text = unserialize(file_get_contents('../private/chat'));
            foreach ($text as $elem)
            {
                $date = date('H:i', $elem["time"]);
                echo "[$date] <b>" . $elem["login"] . "</b>:" . $elem["msg"] . "<br />\n";
            }
        }
    }
?>