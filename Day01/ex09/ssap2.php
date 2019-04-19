#!/usr/bin/php
<?PHP
    function mass_switch($mass)
    {
        $mass = array_values($mass);
        foreach($mass as $elem)
        {
            $elem2 = next($mass);
            if((is_numeric($elem[1])) && (ctype_alpha($elem2[1])) && ($elem[0] == $elem2[0]))
            {   
                $key = array_search($elem, $mass);
                $key2 = array_search($elem2, $mass);
                $temp = $mass[$key];
                $mass[$key] = $mass[$key2];
                $mass[$key2] = $temp;
                $mass = mass_switch($mass);
                $prev = prev($mass);
                if (is_numeric($prev[1]))
                    mass_switch($mass);
            }
        }
        return $mass;
    }

    if ($argc >= 2)
	{
        $mass = explode(" ", implode(" ", $argv));
        $massn = $mass; 
        $massa = $mass;
        $no = $mass[0];
        $buk = array();
        foreach($mass as $elem)
        {
            if(ctype_alpha($elem[0]))
                array_push($buk, $elem);
        }
        natcasesort($buk);                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        $buk = mass_switch($buk);
        $num = array();
        foreach($massn as $elem)
        {
            if(is_numeric($elem))
                array_push($num, $elem);
        }
        sort($num, SORT_STRING);
        $staf = array();
        foreach($massa as $elem)
        {
            if(ctype_alnum($elem[0]) == FALSE)
                array_push($staf, $elem);
        }
        sort($staf);
        $final = array_merge($buk, $num);
        $final = array_merge($final, $staf);
        foreach($final as $elem)
        {
            if ($elem != $no)
                echo "$elem\n";
        }
    }
?>