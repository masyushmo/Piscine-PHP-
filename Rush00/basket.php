<?php
if (!file_exists("data/main"))
{
	header("Location: install.php");
}
session_start();
$data = unserialize(file_get_contents("data/main"));
$users = unserialize(file_get_contents("data/users"));
$products = unserialize(file_get_contents("data/products"));
if (!$users[$_SESSION['logged_user']])
	$_SESSION['logged_user'] = "";
 ?>
 <html>
 <head>
 	<link rel="stylesheet" href="style/home.css">
 	<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">
 	<title>Basket</title>
 </head>
 	<body>
	 <div id="tab">
 				<div>
 					<a href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/LEGO_logo.svg/500px-LEGO_logo.svg.png" alt="LOGO" id="logo"></a>
 				</div>
 				<div class="links-container">
 					<?php if (!$_SESSION['logged_user'] || $_SESSION['logged_user'] == "") {?>
 					<a href="register.php"><img src="https://static.thenounproject.com/png/16385-200.png" alt="Register" title="Registration" id="register"></a>
 					<a href="login.php"><img src="https://cdn3.iconfinder.com/data/icons/security-3-1/512/access-512.png" alt="Login" title="Login" id="login"></a>
 					<?php } ?>
 					<?php if ($_SESSION['logged_user'] && $_SESSION['logged_user'] != "" && $users[$_SESSION['logged_user']]['Acess'] < 1) {?>
 					<a href="logout.php"><img src="http://cdn.onlinewebfonts.com/svg/img_211158.png" alt="Logout" title="Logout" id="logout"></a>
				 <?php }   if ($users[$_SESSION['logged_user']]['Acess'] >= 1) {?>
					<a href="logout.php"><img src="http://cdn.onlinewebfonts.com/svg/img_211158.png" alt="Logout" title="Logout" id="logoutadm"></a>
					 <a href="admin.php"><img src="https://cdn3.iconfinder.com/data/icons/business-vol-21/100/Artboard_9-512.png" alt="Admin" title="Admin Page" id="adm"></a>
 				<?php } ?>
				</div>
				<a href="freebasket.php"><img src="https://cdn0.iconfinder.com/data/icons/shopping-basket-icons/800/basket2-512.png" alt="Free Busket" title="Free Busket" id="Free"></a>
			</div>		
		<div class = "basket">
 				<?php  if (file_exists("data/basket"))
	$basket = unserialize(file_get_contents("data/basket"));
	$total = 0;
	foreach ($basket[$_SESSION['logged_user']] as $prodname => $count) {
		foreach ($products as $key => $product) {
		if ($product['Name'] == $prodname)
		{
			$total += ($product['Price'] * $count);
?>
<h1 id="total">Total: <?php echo $total ?>$</h1>
<div class="productcontainer">
	<div class = "productimagecontainer"><img class="productimage" src="<?php echo $products[$key]["Photo"] ?>"></div>
	<div class = "productnamecontainer"><h2><?php echo $product["Name"] . " x " . $count ?></h2></div>
	<div class = "productprice"><h2>Price: <?php echo ($products[$key]["Price"] * $count) ?>$</h2></div>
	</div> <?php }}} ?>
	<br>
	<?php if ($_SESSION['logged_user'] && $_SESSION['logged_user'] != "" && $total > 0)  {?>
	<a href="order.php"><img src="https://cdn4.iconfinder.com/data/icons/logistic-circle-color/1024/order_confirm1-512.png" alt="Confirm" title="Confirm" id="confirm"></a>
<?php } ?>
 		</div>
 	</body>
 </html>
