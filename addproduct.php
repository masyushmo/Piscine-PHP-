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
	if (file_exists("data/products"))
	 	$products = unserialize(file_get_contents("data/products"));
if ($_POST['productname'] && $_POST['productprice'] && $_FILES['productimg']['tmp_name'] && $_POST['submit'] == "ADD")
{
	foreach ($products as $product) {
		if ($product["Name"] == $_POST['productname'])
			$producttaken = true;
	}
	if (!$producttaken)
	{
	 $_FILES['productimg']['name'] = preg_replace("/\s/", "_", $_FILES['productimg']['name']);
	if (file_exists("img/" . $_FILES['productimg']['name']))
	{
		$products['same_name'][$_FILES['productimg']['name']] += 1;
		$photo = "img/" . "(" . $products['same_name'][$_FILES['productimg']['name']] . ")" . $_FILES['productimg']['name'];
		rename($_FILES['productimg']['tmp_name'], $photo);
	}
	else
	{
		$photo = "img/" . $_FILES['productimg']['name'];
		rename($_FILES['productimg']['tmp_name'], $photo);
	}
		foreach ($_POST['productcategory'] as $value) {
		$productcategories[] = $value;
	}

	$product = ["Name" => $_POST['productname'], "Price" => $_POST['productprice'], "Photo" => $photo, "Categories" => $productcategories];
	$products[] = $product;
	foreach ($productcategories as $value) {
		$categories[$value][] = $_POST['productname'];
	}
	file_put_contents("data/products", serialize($products));
	file_put_contents("data/categories", serialize($categories));
	header("Location: products.php");
}
}
?>
<html>
<head>
	<title>Add Product</title>
</head>
	<body>
		<link rel="stylesheet" href="style.css">
			<div class="logocontainer">
			<img class="logoimg" src="img/logo.png">
		</div>
		<div class="container center">
			<h1>Add Product</h1>
			<a href="products.php">Back to products</a>
			<form enctype="multipart/form-data" method="post" action="addproduct.php">
				<label for="productname">Name: </label><input id="productname" name="productname" type="text">
				<br>
				<label for="productcategory">Category: </label><select multiple name="productcategory[]" id="productcategory">
					<?php foreach ($categories as $key => $value) {
						echo "<option value=" . $key . ">". $key ."</option>";
					} ?>
				</select><br>
				<label for="productprice">Price: </label><input id="productprice" min="1" name="productprice" type="number">
				<br>
				<label for="productimg">Photo: </label><input accept=".jpg, .jpeg, .png" id="productimg" name="productimg" type="file">
				<br>
				<input id="submit" name="submit" type="submit" value="ADD">
			</form>
		</div>
	</body>
</html>