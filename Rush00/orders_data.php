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
if(file_exists("data/orders"))
	$orders = unserialize(file_get_contents("data/orders"));
 ?>
<html>
<body style="background-color: transparent;">
		<link rel="stylesheet" href="style.css">
<table>
	<tr>
		<td class="tdid">Name:</td>
		<td class="tdphoto">MSG:</td>
		<td class="tdactions">Total:</td>
		<td class="tdactions">Time:</td>
		<td class="tdactions">Action:</td>
	</tr>
<?php 
foreach ($orders as $key => $value) {
	echo "<tr><td>" . $value["Name"] . "</td><td>"; 
	foreach ($value["MSG"] as $value2) {
		echo $value2 . "<br>"; 
	}
	echo "</td><td>". $value["Total"] . " $" . "</td><td>". $value["Time"] . "</td><td><a href=deleteorder.php?id=". $key .">Delete</a></tr>" ;
}
?>
</table>
	</body>	
</html>