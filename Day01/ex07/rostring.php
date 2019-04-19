#!/usr/bin/php
<?PHP
	if ($argc >= 2)
	{
		$str = preg_replace('/\s+/', ' ', trim($argv[1]));
		$mass = explode(" ", $str);
		$i = $mass[0];
		foreach($mass as $elem)
		{
			if ($elem != $i)
			{
				echo "$elem ";
			}
		}
		echo "$i\n";
	}
?>