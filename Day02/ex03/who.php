#!/usr/bin/php
<?PHP
    date_default_timezone_set("Europe/Moscow");
    $fd = fopen("/var/run/utmpx", 'r');
    $name = get_current_user();
    while ((!feof($fd)) && ($binar = fread($fd, 628)))
    {
        $logs = unpack("A256/a4b/a32c/id/ie/If/a256g/i16h", $binar);
        if ($logs['e'] == 7)
		    echo "$name " . "$logs[c]  " . date('M  j H:i', $logs[f]) . "\n";
    }
    fclose($fd);
?>