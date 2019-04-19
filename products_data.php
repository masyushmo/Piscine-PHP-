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
	if(file_exists("data/products"))
		$products = unserialize(file_get_contents("data/products"));
 ?>
<html>
<body style="background-color: transparent;">
		<link rel="stylesheet" href="style.css">
<table>
	<tr>
		<td class="tdid">№</td>
		<td class="tdphoto">Photo:</td>
		<td class="tdname">Name:</td>
		<td class="tdcategories">Categories:</td>
		<td class="tdprice">Price:</td>
		<td class="tdactions">Actions</td>
	</tr>
<?php 
foreach ($products as $key => $product) {
	if (!is_numeric($key))
		continue;
	echo "<tr><td>". ($key + 1) ."</td><td><img class=miniphoto src=" . $product['Photo'] . "></td><td>" . $product['Name'] . "</td><td>";
	foreach ($product['Categories'] as $value) {
		echo $value . "<br>";
	}
	echo "</td><td>" . $product['Price'] . "</td><td><a href=deleteproduct.php?id=". $key .">Delete</a></td></tr>\n";
}
?>
</table>
	</body>	
</html>