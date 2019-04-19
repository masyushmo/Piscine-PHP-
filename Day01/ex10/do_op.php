#!/usr/bin/php
<?PHP
    if ($argc != 4)
    {
        echo "wrong of arguments given!\n";
    }
    else
    {
        $num1 = trim($argv[1]);
        $op = trim($argv[2]);
        $num2 = trim($argv[3]);
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