#!/usr/bin/php
<?PHP
	while (1)
	{	
		echo "Enter a number: ";
		$i = trim(fgets(STDIN));
		if (feof(STDIN))
		{
			echo "\n";
			exit;
		}
		if (is_numeric($i))
		{
			if ($i % 2 == 0)
			{
				echo "The number $i is even\n";
			}
			else
				echo "The number $i is odd\n";
		}
		else
			echo "'$i' is not a number\n";
	}
?>