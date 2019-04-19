#!/usr/bin/php
<?PHP
    if($argc == 2)
    {
        $fp = fopen($argv[1], "r") or die("I CANT READ!!!");
        while (!feof($fp))
        {
            $line = fgets($fp);
            $line = preg_replace_callback('/<a.*?title="(.*?)">/',
                function ($matches)
                {
                    return(str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
                },$line);
            $line = preg_replace_callback('/<a.*?title=".*?">(.*?)</',
                function ($matches)
                {
                    return(str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
                },$line);
            $line = preg_replace_callback('/<img\ssrc=.*?\stitle="(.*?)"><\/a>/',
                function ($matches)
                {
                    return(str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
                },$line);
            $line = preg_replace_callback('/<a.*?>(.*?)</',
                function ($matches)
                {
                    return(str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
                },$line);
            echo $line;
        }
        fclose($fp);
    }
?>