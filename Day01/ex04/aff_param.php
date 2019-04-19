#!/usr/bin/php
<?PHP
	$i = $argv[0];
	foreach ($argv as $elem)
	{
		if ($elem != $i)
			echo "$elem\n";
	}
?>