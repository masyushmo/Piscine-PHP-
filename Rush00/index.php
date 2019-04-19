<?php 
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$data = unserialize(file_get_contents("data/main"));
$users = unserialize(file_get_contents("data/users"));
if (!$users[$_SESSION['logged_user']])
	$_SESSION['logged_user'] = "";
 ?>
 <html>
 <head>
 	<link rel="stylesheet" href="style/home.css">
 	<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
 	<title><?php echo $data['Title'] ?></title>
 </head>
 	<body>
	 	<div id="tab">
 				<div class="logo-container">
				 <a href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/LEGO_logo.svg/500px-LEGO_logo.svg.png" alt="LOGO" id="logo"></a>
 				</div>
 				<div class="links-container">
 					<?php if (!$_SESSION['logged_user'] || $_SESSION['logged_user'] == "") {?>
					<a href="register.php"><img src="https://static.thenounproject.com/png/16385-200.png" alt="Register" title="Registration" id="register"></a>
 					<a href="login.php"><img src="https://cdn3.iconfinder.com/data/icons/security-3-1/512/access-512.png" alt="Login" title="Login" id="login"></a>
 					<?php } ?>
 					<?php if ($_SESSION['logged_user'] && $_SESSION['logged_user'] != "" && $users[$_SESSION['logged_user']]['Acess'] < 1) {?>
						<a class="headerlink" href="logout.php"><img src="http://cdn.onlinewebfonts.com/svg/img_211158.png" alt="Logout" title="Logout" id="logout"></a>
 				<?php }   if ($users[$_SESSION['logged_user']]['Acess'] >= 1) {?>
					<a class="headerlink" href="logout.php"><img src="http://cdn.onlinewebfonts.com/svg/img_211158.png" alt="Logout" title="Logout" id="logoutadm"></a>
					 <a class="headerlink" href="admin.php"><img src="https://cdn3.iconfinder.com/data/icons/business-vol-21/100/Artboard_9-512.png" alt="Admin" title="Admin Page" id="adm"></a>
 				<?php } ?>
				 </div>
 			<div class= "category">
				 <h1 class="categorytitle">Categories</h1>
				 <hr>
 				<?php if (file_exists("data/categories"))
 				$categories = unserialize(file_get_contents("data/categories"));
 				foreach ($categories as $key => $value) {
 				 ?>
 				 <a class="categories" href="index.php?category=<?php echo $key ?>"><h2><?php echo $key ?></h2></a>
 				<?php } ?>
			 </div>
			 <a href="basket.php"><img src="https://purepng.com/public/uploads/large/purepng.com-shopping-basketshoppingcarttrolleycarriagebuggysupermarketsbasket-1421526532727qjew3.png" alt="Basket" title="Basket" id="basket"></a>
		</div>
 			<div class = "showcase">
 				<?php  if (file_exists("data/products"))
	$products = unserialize(file_get_contents("data/products"));
foreach ($products as $key => $product) {
	if (!$_GET['category'] && is_numeric($key)) {
		$i = 0;
?>
<div class="productcontainer">
	<div class = "productimagecontainer"><img class="productimage" src="<?php echo $product["Photo"] ?>"></div>
	<div class = "productcategories">Categories: <?php foreach ($product["Categories"] as $value){$i++; echo $value; if ($i < count($product['Categories'])) echo ", "; else echo "."; }?></div>
	<div class = "productnamecontainer"><h2><?php echo $product["Name"] ?></h2></div>
	<div class = "productprice"><h2>Price: <?php echo $product["Price"] ?>$</h2></div>
	<div class = "buy"><a href="buy.php?name=<?php echo $product['Name'] ?>"><img src="img/add.png" alt="Basket" title="Basket" id="add"></a></div>
	</div> <?php } ?>

	<?php  if ($_GET['category']){
		foreach ($product['Categories'] as $value) {
			if ($value == $_GET['category'])
			{
				?>
				<div class="productcontainer">
	<div class = "productimagecontainer"><img class="productimage" src="<?php echo $product["Photo"] ?>"></div>
	<div class = "productcategories">Categories: <?php foreach ($product["Categories"] as $value){$i++; echo $value; if ($i < count($product['Categories'])) echo ", "; else echo "."; }?></div>
	<div class = "productnamecontainer"><h2><?php echo $product["Name"] ?></h2></div>
	<div class = "productprice"><h2>Price: <?php echo $product["Price"] ?>$</h2></div>
	<div class = "buy"><a href="buy.php?name=<?php echo $product['Name'] ?>"><img src="img/add.png" alt="Add" title="Add" id="add"></a></div>
</div>
				<?php
			}
		}
	}
}?>


 			</div>
 	</body>
 </html>
