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
if ($_POST['categoryname'] && $_POST['submit'] == "ADD")
{
	 if (file_exists("data/categories"))
	 	$categories = unserialize(file_get_contents("data/categories"));
	 $category = $_POST['categoryname'];
	 $categories[$category] = array();
	file_put_contents("data/categories", serialize($categories));
	header("Location: categories.php");
}
?>
<html>
<head>
	<title>Add Category</title>
</head>
	<body>
		<link rel="stylesheet" href="style.css">
			<div class="logocontainer">
			<img class="logoimg" src="img/logo.png">
		</div>
		<div class="container center">
			<h1>Add Category</h1>
			<a href="categories.php">Back to Categories</a>
			<form style="margin-top: 20px;"enctype="multipart/form-data" method="post" action="addcategory.php">
				<label for="categoryname">Name: </label><input id="categoryname" name="categoryname" type="text">
				<br>
				<input id="submit" name="submit" type="submit" value="ADD">
			</form>
		</div>
	</body>
</html>