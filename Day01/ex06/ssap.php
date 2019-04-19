#!/usr/bin/php
<?PHP
	if ($argc >= 2)
	{
		$mass = explode(" ", implode(" ", $argv));
		$i = $argv[0];
		sort($mass);
		foreach($mass as $elem)
		{
			if ($elem != $i)
				echo "$elem\n";
		}
	}
?>