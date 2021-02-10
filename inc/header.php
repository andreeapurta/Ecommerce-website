<?php


$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
Session::init();





//include all the classes 
spl_autoload_register(function ($class) {
	include_once "classes/" . $class . ".php";
});

$database = new Database();
$format = new Format();
$product = new Product();
$cart = new Cart();
$category = new Category();
$customer = new Customer();



?>
<!DOCTYPE HTML>

<head>
	<title>Store Website</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/meu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



</head>

<body>

	<div class="nav-menu">
		<nav class="navbar navbar-expand-lg  navbar-dark navbar-default">
			<a class="navbar-brand" href="#"><img src="assets/logo.png" alt="Logo" style="width:80px;"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="products.php">Shop</a>
					</li>
			
					<li class="nav-item"><?php
											$login =  Session::get("customerLogin");
											if ($login == true) {
											?>
							<a  class="nav-link" href="profile.php">User Profile</a>

						<?php }  ?>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>

				</ul>
				<ul class="nav navbar-nav navbar-right">

					<div class="shopping_cart">
						<div class="cart">
						<span class="fa fa-shopping-cart  fa-lg "></span>
							<a href="cart.php" title="View my shopping cart">
								<span class="cart_title">Cart</span>
								<span class="no_product">

									<?php
									$getSum = $cart->CheckCart();
									if ($getSum) {
										$sum = Session::get("sum");
										echo "$" . $sum;
									} else {
										echo "(Empty)";
									}
									?>
								</span>
							</a>
						</div>
					</div>

					<?php

					//when the user logges out the session is destroyed
					if (isset($_GET['customerId'])) {    //delete all the session data from cart table
						$delDataFromCart = $cart->delDataFromCart();
						Session::destroy();
					}
					?>
					<div class="login">
						<?php
						$login =  Session::get("customerLogin");
						if ($login == false) {
						?>
							<a href="login.php">Login</a>
					
				<?php } else {
				?>
					<a href="?customerId=<?php Session::get('customerId'); ?>">Logout</a>

					</div>
			</div>


		<?php    } ?>



	</div>
	</nav>
	</div>