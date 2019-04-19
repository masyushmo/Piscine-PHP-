#!/usr/bin/php
<?PHP
    function stop()
    {
        echo "Syntax Error\n";
        exit;
    }

    if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
    }
    else
    {
        $masa = preg_replace('/\s+/', '', $argv[1]);
        $len = strlen($masa);
        $a = 0;
        $masa = str_split($masa);
        if(!(is_numeric($masa[0])))
            stop();
        while(is_numeric($masa[$a]))
        {    
            $num1[] = $masa[$a];
            $a++;
        }
        $aa = $a + 1;
        if (($masa[$a] != '*' && $masa[$a] != '%' && $masa[$a] != '/' &&
            $masa[$a] != '-' && $masa[$a] != '+') && is_numeric($masa[$aa]))
            stop();
        $op = $masa[$a];
        $a++;
        if(!(is_numeric($masa[$a])))
            stop();
        while(is_numeric($masa[$a]))
        {    
            $num2[] = $masa[$a];
            $a++;
        }
        $num1 = implode("", $num1);
        $num2 = implode("", $num2);
        if(!(is_numeric($num1)) || !(is_numeric($num2)))
            stop();
        $check = strlen($num1 . $num2 . $op);
        if ($check != $len)
            stop();
        if ($op == '+')
            $res = $num1 + $num2;
        if ($op == '-')
            $res = $num1 - $num2;
        if ($op == '/')
            $res = $num1 / $num2;
        if ($op == '%')
            $res = $num1 % $num2;
        if ($op == '*')
            $res = $num1 * $num2;
        echo "$res\n";
    }

?>