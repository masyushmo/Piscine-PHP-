#!/usr/bin/php
<?PHP
    date_default_timezone_set('UTS');
    if($argc != 2)
    {
        exit;
    }
    else
    {
        $mass = explode(" ", $argv[1]);
        if(count($mass) != 5)
        {
            echo "Wrong Format\n";
            exit;
        }
        $argv[1] = strtolower($argv[1]);
        if (preg_match('/^(lundi|mardi|mercredi|jeudi|vendredi|samedi|dimanche)\s(0[1-9]|[1-2][0-9]|3[0-1])\s(janvier|février|mars|avril|mai|juin|juillet|aout|septembre|octobre|novembre|décembre)\s[0-9]{4}\s(00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/', $argv[1]))
        {
            $months = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre");
            print_r($days);
            $hms = explode(":", $mass[4]);
            $m = array_search($mass[2], $months);
            $time = mktime($hms[0], $hms[1], $hms[2], $m[2], $mass[1], $mass[3]);
            echo "$time\n";
        }
        else
            echo "Wrong Format\n";
    } 
?>