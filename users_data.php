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
	if(file_exists("data/users"))
$users = unserialize(file_get_contents("data/users"));
 ?>
<html>
<body style="background-color: transparent;">
		<link rel="stylesheet" href="style.css">
<table>
	<tr>
		<td class="tdid">Login:</td>
		<td class="tdphoto">Access Level:</td>
		<td class="tdactions">Actions:</td>
	</tr>
<?php 
foreach ($users as $key => $value) {
	if ($value['Acess'] == 2)
		echo "<tr><td>". $key ."</td><td>" . $value['Acess'] ."</td><td></td></tr>\n";
	if ($value['Acess'] == 0)
		echo "<tr><td>". $key ."</td><td>" . $value['Acess'] ."</td><td><a href=manageusers.php?login=". $key ."&set=admin>Set Admin</a><br><a href=manageusers.php?login=". $key ."&set=delete>Delete</a></td></tr>\n";
	if ($value['Acess'] == 1 && $_SESSION['logged_user'] != $key)
		echo "<tr><td>". $key ."</td><td>" . $value['Acess'] ."</td><td><a href=manageusers.php?login=". $key ."&set=user>Set User</a><br></td></tr>\n";
	if ($value['Acess'] == 1 && $_SESSION['logged_user'] == $key)
		echo "<tr><td>". $key ."</td><td>" . $value['Acess'] ."</td><td><br></td></tr>\n";
}
?>
</table>
	</body>	
</html>