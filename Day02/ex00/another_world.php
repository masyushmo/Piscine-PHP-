#!/usr/bin/php
<?PHP
    if ($argc < 2)
        exit;
    echo preg_replace('/\s+/', ' ', trim($argv[1]));
    echo "\n";
?>