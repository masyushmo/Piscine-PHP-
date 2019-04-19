<?PHP
	function ft_is_sort($str)
	{
		$coma = $str;
		sort($coma);
		if (strcmp(implode($str), implode($coma)) == 0)
			return true;
		else
			return false;
	}
?>