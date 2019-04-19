<?PHP
	function ft_split($str)
	{
		$dst = explode(" ", $str);
		sort($dst);
		return $dst;
	}
?>