<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$users = unserialize(file_get_contents("data/users"));
if ($users[$_SESSION['logged_user']]["Acess"] < 1)
{
	header("Location: index.php");
}
if (file_exists("data/categories"))
	$categories = unserialize(file_get_contents("data/categories"));
 ?>
<html>
<body style="background-color: transparent;">
		<link rel="stylesheet" href="style.css">
<table>
	<tr>
		<td class="tdcategory">Category:</td>
		<td class="tdactions">Actions:</td>
	</tr>
<?php 
foreach ($categories as $key => $value) {
	echo "<tr><td>". $key ."</td><td><a href=deletecategory.php?id=". $key .">Delete</a></td></tr>\n";
}
?>
</table>
	</body>	
</html>