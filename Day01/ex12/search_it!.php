#!/usr/bin/php
<?PHP
    if ($argc >= 3)
    {
        $save = $argv[1];
        unset($argv[1]);
        unset($argv[0]);
        $argv = array_values($argv);
        foreach ($argv as $elem)
        {
            $split = explode(":", $elem);
            if ($save == $split[0])
                echo "$split[1]\n";
        }
    }
?>